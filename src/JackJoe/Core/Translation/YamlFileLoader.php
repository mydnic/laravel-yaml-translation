<?php namespace JackJoe\Core\Translation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Symfony\Component\Yaml\Yaml;

class YamlFileLoader extends FileLoader {
  protected function getAllowedFileExtensions() {
    return ['php', 'yml', 'yaml'];
  }

  protected function loadNamespaceOverrides(array $lines, $locale, $group, $namespace) {
    foreach ($this->getAllowedFileExtensions() as $extension) {
      $file = "{$this->path}/packages/{$locale}/{$namespace}/{$group}." . $extension;

      if ($this->files->exists($file)) {
        return $this->replaceLines($extension, $lines, $file);
      }
    }

    return $lines;
  }

  protected function replaceLines($format, $lines, $file) {
    return array_replace_recursive($lines, $this->parseContent($format, $file));
  }

  protected function parseContent($format, $file) {
    $content = null;

    switch ($format) {
    case 'php':
      $content = $this->files->getRequire($file);
      break;
    case 'yml':
    case 'yaml':
      $content = $this->parseYamlOrLoadFromCache($file);
      break;
    }

    return $content;
  }

  protected function loadPath($path, $locale, $group) {
    foreach ($this->getAllowedFileExtensions() as $extension) {
      if ($this->files->exists($full = "{$path}/{$locale}/{$group}." . $extension)) {
        return $this->parseContent($extension, $full);
      }
    }

    return [];
  }

  protected function parseYamlOrLoadFromCache($file) {
    $cachefile = storage_path() . '/framework/cache/yaml.lang.cache.' . md5($file) . '.php';

    if (@filemtime($cachefile) < filemtime($file)) {
      $content = Yaml::parseFile($file);
      file_put_contents($cachefile, "<?php" . PHP_EOL . PHP_EOL . "return " . var_export($content, true) . ";");
      return $content;
    }

    return $this->files->getRequire($cachefile);
  }
}
