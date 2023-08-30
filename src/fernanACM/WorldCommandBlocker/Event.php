<?php

#      _       ____   __  __ 
#     / \     / ___| |  \/  |
#    / _ \   | |     | |\/| |
#   / ___ \  | |___  | |  | |
#  /_/   \_\  \____| |_|  |_|
# The creator of this plugin was fernanACM.
# https://github.com/fernanACM

namespace fernanACM\WorldCommandBlocker;

use pocketmine\player\Player;

use pocketmine\event\Listener;

use pocketmine\event\server\CommandEvent;

use fernanACM\WorldCommandBlocker\utils\PluginUtils;
use fernanACM\WorldCommandBlocker\WCB;

class Event implements Listener{

    /**
     * @param CommandEvent $event
     * @return void
     */
    public function onPreCommand(CommandEvent $event): void{
        $player = $event->getSender();
        $messageCMD = $event->getCommand();
        if(!$player instanceof Player)return;
        $worldFolderName = $player->getWorld()->getFolderName();
        if(isset(WCB::getInstance()->blocker[$worldFolderName])){
            $blockedList = WCB::getInstance()->blocker[$worldFolderName];
            $command = strtolower(explode(" ", $messageCMD, 2)[0]);
            if(in_array($command, $blockedList)){
                $permissionToCheck = "worldcommandblocker.allow.$worldFolderName.$command";
                if(!($player->hasPermission("worldcommandblocker.allow") ||
                    $player->hasPermission("worldcommandblocker.allow.$worldFolderName") || $player->hasPermission($permissionToCheck)
                )){
                    $event->cancel();
                    if(WCB::getInstance()->config->getNested("blocked-message")) {
                        $prefix = WCB::getInstance()->getMessage($player, "Prefix");
                        $player->sendMessage($prefix . WCB::getInstance()->getMessage($player, "error-message"));
                        PluginUtils::PlaySound($player, "mob.villager.no", 1, 1);
                    }
                }
            }
        }
    }
}
