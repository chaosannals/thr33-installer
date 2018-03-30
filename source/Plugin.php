<?php namespace Thr33\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Thr33 的 Composer 插件
 * 
 */
final class Plugin implements PluginInterface {
    /**
     * Thr33 插件生效，加载模块。
     * 
     * @param Composer $composer: Composer 对象。
     * @param IOInterface $io: Composer IO 输出接口。
     */
    public function activate(Composer $composer, IOInterface $io) {
        $manager = $composer->getInstallerManager();
        $manager->addInstaller(new Installer($io, $composer, 'thr33-module'));
    }
} 