<?php

namespace Ihsan48\EasyGameChange;

use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Loader extends PluginBase {
    
    private Config $cfg;

    public function onEnable() : void {
        $this->saveResource("config.yml");
        $this->cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch ($cmd->getName()) {
            case "gmc":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("easygamechange.creative")) {
                        if (!$sender->getGameMode()->equals(GameMode::CREATIVE())) {
                            $sender->setGamemode(GameMode::CREATIVE());
                            $sender->sendMessage($this->cfg->get("gamemode.creative"));
                        }
                    } else {
                        $sender->sendMessage("§cYou don't have a permission to use this command");
                    }
                } else {
                    $sender->sendMessage("Your are not a player");
                }

                if (isset($args[0])) {
                    if (strtolower($args[0])) {
                        if ($sender->hasPermission("easygamechange.creative.other")) {
                            if (($args[0]) != $sender->getName()) {
                                $target = $this->getServer()->getPlayerByPrefix($args[0]);
                                $target->setGamemode(GameMode::CREATIVE());
                                $sender->sendMessage(str_replace("{name}", $target->getName(), $this->cfg->get("gamemode.other.creative")));
                            } else {
                                $sender->sendMessage("§cYou can't change your gamemode with /gmc <string:name>");
                            }
                        } else {
                            $sender->sendMessage("§cYou don't have a permission to use this command");
                        }
                    }
                }
                break;
            case "gms":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("easygamechange.survival")) {
                        if (!$sender->getGameMode()->equals(GameMode::SURVIVAL())) {
                            $sender->setGamemode(GameMode::SURVIVAL());
                            $sender->sendMessage($this->cfg->get("gamemode.survival"));
                        }
                    } else {
                        $sender->sendMessage("§cYou don't have a permission to use this command");
                    }
                } else {
                    $sender->sendMessage("Your are not a player");
                }

                if (isset($args[0])) {
                    if (strtolower($args[0])) {
                        if ($sender->hasPermission("easygamechange.survial.other")) {
                            if (($args[0]) != $sender->getName()) {
                                $target = $this->getServer()->getPlayerByPrefix($args[0]);
                                $target->setGamemode(GameMode::SURVIVAL());
                                $sender->sendMessage(str_replace("{name}", $target->getName(), $this->cfg->get("gamemode.other.survival")));
                            } else {
                                $sender->sendMessage("§cYou can't change your gamemode with /gms <string:name>");
                            }
                        } else {
                            $sender->sendMessage("§cYou don't have a permission to use this command");
                        }
                    }
                }
                break;
            case "gmspc":
                if ($sender instanceof Player) {
                    if ($sender->hasPermission("easygamechange.spectator")) {
                        if (!$sender->getGameMode()->equals(GameMode::SPECTATOR())) {
                            $sender->setGamemode(GameMode::SPECTATOR());
                            $sender->sendMessage($this->cfg->get("gamemode.spectator"));
                        }
                    } else {
                        $sender->sendMessage("§cYou don't have a permission to use this command");
                    }
                } else {
                    $sender->sendMessage("Your are not a player");
                }

                if (isset($args[0])) {
                    if (strtolower($args[0])) {
                        if ($sender->hasPermission("easygamechange.spectator.other")) {
                            if (($args[0]) != $sender->getName()) {
                                $target = $this->getServer()->getPlayerByPrefix($args[0]);
                                $target->setGamemode(GameMode::SPECTATOR());
                                $sender->sendMessage(str_replace("{name}", $target->getName(), $this->cfg->get("gamemode.other.spectator")));
                            } else {
                                $sender->sendMessage("§cYou can't change your gamemode with /gmspc <string:name>");
                            }
                        } else {
                            $sender->sendMessage("§cYou don't have a permission to use this command");
                        }
                    }
                }
                break;
        }
    return true;
    }
}
