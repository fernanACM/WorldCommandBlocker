<?php

#      _       ____   __  __ 
#     / \     / ___| |  \/  |
#    / _ \   | |     | |\/| |
#   / ___ \  | |___  | |  | |
#  /_/   \_\  \____| |_|  |_|
# The creator of this plugin was fernanACM.
# https://github.com/fernanACM

namespace fernanACM\WorldCommandBlocker;

use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\Config;

use fernanACM\WorldCommandBlocker\Event;
use fernanACM\WorldCommandBlocker\utils\PluginUtils;

class Loader extends PluginBase{

    # Config
    public Config $config;
    public Config $messages;
    public $blocker = [];
    # Instance
    public static $instance;
    # MultiLanguages
    public const LANGUAGES = [
        "eng", // English
        "spa", // Spanish
        "indo", //Indonesian
        "ger", // German
        "frc", // French
        "portg" // Portuguese
    ];

    public function onEnable(): void{
        self::$instance = $this;
        $this->loadFiles();
        $this->loadEvents();
    }

    public function loadFiles(){
        # Config files
        $this->saveResource("config.yml");
        $this->saveResource("messages.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml");
        $this->messages = new Config($this->getFile() . "resources/languages/" . $this->config->get("language", "eng") . ".yml");
        $this->blocker = $this->config->getNested("Settings.blocked-commands", []);
        # Languages
        @mkdir($this->getDataFolder() . "languages");
        foreach(Loader::LANGUAGES as $language){
            $this->saveResource("languages" . DIRECTORY_SEPARATOR . $language . ".yml");
        }
    }

    public function loadEvents(){
        $this->getServer()->getPluginManager()->registerEvent(new Event($this), $this);
    }

    public function getMessage(Player $player, string $key){
        return PluginUtils::codeUtil($player, $this->messages->getNested($key, $key));
    }

    public static function getInstance(): Loader{
        return self::$instance;
    }
}