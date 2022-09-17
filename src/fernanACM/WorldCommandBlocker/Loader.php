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
    # CheckConfig
    public const CONFIG_VERSION = "1.0.0";
    public const LANGUANGE_VERSION = "1.0.0";
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
        $this->loadCheck();
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

    public function loadCheck(){
        # CONFIG
        if((!$this->config->exists("config-version")) || ($this->config->get("config-version") != self::CONFIG_VERSION)){
            rename($this->getDataFolder() . "config.yml", $this->getDataFolder() . "config_old.yml");
            $this->saveResource("config.yml");
            $this->getLogger()->critical("Your configuration file is outdated.");
            $this->getLogger()->notice("Your old configuration has been saved as config_old.yml and a new configuration file has been generated. Please update accordingly.");
        }
        # LANGUAGES
        $data = new Config($this->getDataFolder() . "languages/" . $this->config->get("language") . ".yml");
        if((!$data->exists("language-version")) || ($data->get("language-version") != self::LANGUANGE_VERSION)){
            rename($this->getDataFolder() . "languages/" . $this->config->get("language") . ".yml", $this->getDataFolder() . "languages/" . $this->config->get("language") . "_old.yml");
            foreach(Loader::LANGUAGES as $language){
                $this->saveResource("languages/" . $language . ".yml");
            }
            $this->getLogger()->critical("Your ".$this->config->get("language").".yml file is outdated.");
            $this->getLogger()->notice("Your old ".$this->config->get("language").".yml has been saved as ".$this->config->get("language")."_old.yml and a new ".$this->config->get("language").".yml file has been generated. Please update accordingly.");
        }
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
