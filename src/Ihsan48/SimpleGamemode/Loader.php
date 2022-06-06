<?php

namespace Ihsan48\SimpleGamemode;

use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase {
    
    public function onEnable() : void {
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch ($cmd->getName()) {
            case "gmc":
                if (!$sender->isCreative()) {
                    $sender->setGamemode(GameMode::CREATIVE());
                    $sender->sendMessage($this->cfg->get("gamemode.creative"));
                }
                    
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPrefix($args[0]);
                    $target->setGamemode(GameMode::CREATIVE());
                    $sender->sendMessage($this->cfg->get(str_replace("{name}", $target->getName(), "gamemode.other.creative")));
                }
                break;
            case "gms":
                if (!$sender->isSurvival()) {
                    $sender->setGamemode(GameMode::SURVIVAL());
                    $sender->sendMessage($this->cfg->get("gamemode.survival"));
                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPrefix($args[0]);
                    $target->setGamemode(GameMode::SURVIVAL());
                    $sender->sendMessage($this->cfg->get(str_replace("{name}", $target->getName(), "gamemode.other.survival")));
                }
                break;
            case "gmspc":
                if (!$sender->isSpectator()) {
                    $sender->setGamemode(GameMode::SPECTATOR());
                    $sender->sendMessage($this->cfg->get("gamemode.spectator"));
                }
                if (isset($args[0])) {
                    $target = $this->getServer()->getPlayerByPrefix($args[0]);
                    $target->setGamemode(GameMode::SPECTATOR());
                    $sender->sendMessage($this->cfg->get(str_replace("{name}", $target->getName(), "gamemode.other.spectator")));
                }
                break;
        }
    return true;
    }
}
