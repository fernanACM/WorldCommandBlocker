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
        "portg", // Portuguese
        "vie" // Vietnamese
    ];
    
    public function onEnable(): void{
         # Config files
        $this->loadFiles();
        $this->loadEvents();
        # Instance
        self::$instance = $this;
    }
    
    public function loadFiles(){
         # Config files
        @mkdir($this->getDataFolder() . "languages");
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml");
        # Languages
        foreach(Loader::LANGUAGES as $language){
            $this->saveResource("languages/" . $language . ".yml");
        }
        $this->messages = new Config($this->getDataFolder() . "languages/" . $this->config->get("language") . ".yml");
        $this->blocker = $this->config->getNested("Settings.blocked-commands", []);
    }

    public function loadEvents(){
        $this->getServer()->getPluginManager()->registerEvents(new Event($this), $this);
    }

    public function getMessage(Player $player, string $key){
        return PluginUtils::codeUtil($player, $this->messages->getNested($key, $key));
    }

    public static function getInstance(): Loader{
        return self::$instance;
    }
}
