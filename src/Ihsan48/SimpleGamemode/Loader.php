<?php

namespace Ihsan48\SimpleGamemode;

use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase {

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch ($cmd->getName()) {
            case "gmc":
                if (!$sender->getGamemode() == GameMode::CREATIVE()) {
                    $sender->setGamemode(GameMode::CREATIVE());

                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPrefix($args[0]);
                    $target->setGamemode(GameMode::CREATIVE());
                }
                break;
            case "gms":
                if (!$sender->getGamemode() == Gamemode::SURVIVAL()) {
                    $sender->setGamemode(GameMode::SURVIVAL());
    
                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPrefix($args[0]);
                    $target->setGamemode(GameMode::SURVIVAL());
                }
                break;
            case "gmspc":
                if (!$sender->getGamemode() == Gamemode::SPECTATOR()) {
                    $sender->setGamemode(GameMode::SPECTATOR());
    
                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPrefix($args[0]);
                    $target->setGamemode(GameMode::SPECTATOR());
                }
                break;
        }
    return true;
    }
}
