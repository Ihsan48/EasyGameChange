<?php

namespace Ihsan48\SimpleGamemode;

use pocketmine\player\Player;
use pocketmine\player\Gamemode;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase {

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch ($cmd->getName()) {
            case "gmc":
                if (!$sender->getGamemode() == Gamemode::CREATIVE()) {
                    $sender->setGamemode(Gamemode::CREATIVE());

                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPerfix($args[0]);
                    $target->setGamemode(Gamemode::CREATIVE());
                }
                break;
            case "gms":
                if (!$sender->getGamemode() == Gamemode::SURVIVAL()) {
                    $sender->setGamemode(Gamemode::SURVIVAL());
    
                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPerfix($args[0]);
                    $target->setGamemode(Gamemode::SURVIVAL());
                }
                break;
            case "gmspc":
                if (!$sender->getGamemode() == Gamemode::SPECTATOR()) {
                    $sender->setGamemode(Gamemode::SPECTATOR());
    
                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPerfix($args[0]);
                    $target->setGamemode(Gamemode::SPECTATOR());
                }
                break;
        }
    return true;
    }
}