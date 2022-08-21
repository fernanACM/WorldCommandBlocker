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

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerCommandPreprocessEvent;

use fernanACM\WorldCommandBlocker\utils\PluginUtils;
use fernanACM\WorldCommandBlocker\Loader;

class Event implements Listener{

    public function onPreCommand(PlayerCommandPreprocessEvent $event){
        $player = $event->getPlayer();
        $command = explode(" ", $event->getMessage())[0];
        if(str_starts_with($command, "/")){
            if(isset(Loader::getInstance()->blocker[$player->getWorld()->getDisplayName()])){
                if(in_array(str_replace("/", "", $command), Loader::getInstance()->blocker[$player->getWorld()->getDisplayName()])){
                    $event->cancel();
                    $prefix = Loader::getInstance()->getMessage($player, "Prefix");
                    $player->sendMessage($prefix . Loader::getInstance()->getMessage($player, "error-message"));
                    PluginUtils::PlaySound($player, "mob.villager.no", 1, 1);
                }
            }
        }elseif(str_starts_with($command, "./")){
            if(isset(Loader::getInstance()->blocker[$player->getWorld()->getDisplayName()])){
                if(in_array(str_replace("./", "", $command), Loader::getInstance()->blocker[$player->getWorld()->getDisplayName()])){
                    $event->cancel();
                    $prefix = Loader::getInstance()->getMessage($player, "Prefix");
                    $player->sendMessage($prefix . Loader::getInstance()->getMessage($player, "error-message"));
                    PluginUtils::PlaySound($player, "mob.villager.no", 1, 1);
                }
            }
        }elseif(str_starts_with($command, "")){
            if(isset(Loader::getInstance()->blocker[$player->getWorld()->getDisplayName()])){
                if(in_array(str_replace("", "", $command), Loader::getInstance()->blocker[$player->getWorld()->getDisplayName()])){
                    $event->cancel();
                    $prefix = Loader::getInstance()->getMessage($player, "Prefix");
                    $player->sendMessage($prefix . Loader::getInstance()->getMessage($player, "error-message"));
                    PluginUtils::PlaySound($player, "mob.villager.no", 1, 1);
                }
            }
        }
    }
}