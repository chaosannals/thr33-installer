<?php namespace Thr33\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

/**
 * 安装器
 * 
 */
final class Installer extends LibraryInstaller {
    /**
     * 通过包类型判断是否处理该包。
     * 
     * @param string $packageType: 匹配类型。
     * @return bool: 如果处理该类型返回 true 否则返回 false。
     */
    public function supports($packageType) {
        return $this->type === $packageType;
    }

    /**
     * 返回包的安装路径。
     * 
     * @param PackageInterface $package: 包。
     * @return string: 包安装路径。
     */
    public function getInstallPath(PackageInterface $package) {
        $name = explode('/', $package->getName())[1];
        $extra = $package->getExtra();
        return $extra['thr33-module-name'] ?? ucfirst($name);
    }
}