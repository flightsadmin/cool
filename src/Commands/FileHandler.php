<?php

namespace Flightsadmin\Cool\Commands;

use GuzzleHttp\Client;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;

trait FileHandler
{
    /**
     * Get the path to the packages directory.
     */
    public function packagesPath()
    {
        return base_path('packages');
    }

    /**
     * Get the vendor path.
     */
    public function vendorPath()
    {
        return $this->packagesPath().'/'.$this->vendor();
    }

    /**
     * Get the path to store a vendor's temporary files.
     */
    public function tempPath()
    {
        return $this->vendorPath().'/temp';
    }

    /**
     * Get the full package path.
     */
    public function packagePath()
    {
        return $this->vendorPath().'/'.$this->package();
    }

    /**
     * Generate a random temporary filename for the package archive file.
     */
    public function makeFilename($extension = 'zip')
    {
        return getcwd().'/package'.md5(time().uniqid()).'.'.$extension;
    }

    /**
     * Check if the package already exists.
     */
    public function checkIfPackageExists()
    {
        if (is_dir($this->packagePath())) {
            throw new RuntimeException('Package already exists');
        }
    }

    /**
     * Create a directory if it doesn't exist.
     */
    public function makeDir($path)
    {
        if (! is_dir($path)) {
            return mkdir($path, 0777, true);
        }

        return false;
    }

    /**
     * Remove a directory if it exists.
     */
    public function removeDir($path)
    {
        $files = array_diff(scandir($path), ['.', '..']);
        foreach ($files as $file) {
            if (is_dir("$path/$file")) {
                $this->removeDir("$path/$file");
            } else {
                @chmod("$path/$file", 0777);
                @unlink("$path/$file");
            }
        }

        return rmdir($path);
    }

    /**
     * Remove the rules files if present.
     */
    public function cleanUpRules()
    {
        $ruleFiles = ['rules.php', 'rewriteRules.php'];

        foreach ($ruleFiles as $file) {
            if (file_exists($this->packagePath().'/'.$file)) {
                unlink($this->packagePath().'/'.$file);
            }
        }
    }
}