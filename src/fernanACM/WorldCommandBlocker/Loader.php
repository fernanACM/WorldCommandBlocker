<?php

namespace fernanACM\WorldCommandBlocker;

use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\Config;

class Loader extends PluginBase{

    # Config
    public Config $config;
    public Config $messages;
    public $blocker = [];
    # Instance
    public static $instance;
    # MultiLanguage
    public const LANGUAGES = [
        "en",
        "spa",
        "indo"
    ];

    public function onEnable(): void{

    }

    public function loadFiles(){
        $this->saveResource("config.yml");
        $this->saveResource("messages.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml");
        $this->messages = new Config($this->getDataFolder() . "messages.yml");
    }
}