<?php
/**
 * Created by PhpStorm.
 * User: LaFuma
 * Date: 8/12/2017
 * Time: 8:41 PM
 */
/*
 ____           ___________
|    |   _____  \_   _____/_ __  _____ _____
|    |   \__  \  |    __)|  |  \/     \\__  \
|    |___ / __ \_|     \ |  |  /  Y Y  \/ __ \_
|_______ (____  /\___  / |____/|__|_|  (____  /
        \/    \/     \/              \/     \/
*/
namespace LaFuma;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as C;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEventy;


class Main extends PluginBase implements Listener
{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(C::YELLOW . "by LaFuma");
    }


    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        switch ($cmd->getName()) {
            case "gm1":
                if ($sender->hasPermission("gm1.lafuma")) {
                    if ($sender instanceof Player) {
                        $sender->setGamemode(1);
                        $sender->sendMessage(C::GRAY . "Ora sei in " . C::BOLD . C::DARK_PURPLE . "CREATIVE" . C::RESET . C::GRAY . " mode");
                        return true;
                    }
                }
            case "gm0":
                if ($sender->hasPermission("gm0.lafuma")) {
                    if ($sender instanceof Player) {
                        $sender->setGamemode(0);
                        $sender->sendMessage(C::GRAY . "Ora sei in " . C::BOLD . C::DARK_PURPLE . "SURVIVAL" . C::RESET . C::GRAY . " mode");
                        return true;
                    }
                }
            case "heal":
                if ($sender->hasPermission("heal.lafuma")) {
                    if ($sender instanceof Player) {
                        $sender->sendMessage(C::GRAY . "Sei Stato Healato");
                        return true;
                    }
                }
            case "feed";
                if ($sender->hasPermission("feed.lafuma")) {
                    if ($sender instanceof Player) {
                        $sender->sendMessage(C::GRAY . "Ora sei sazio");
                        return true;
                    }
                }
            case "size":
                if ($sender->hasPermission("size.lafuma"))
                    if ($sender instanceof Player) {
                        $sender->sendMessage(C:: GRAY . "Use /size 1/2/3/4");
                    }
                switch ($args[0]) {
                    case "1":
                        if ($sender instanceof Player) {
                            $sender->setScale(1);
                            $sender->sendMessage(C::GRAY . "Changed ur scale to " . C::DARK_PURPLE . "1");
                            return true;
                        }
                        switch ($args[0]) {
                            case "2":
                                if ($sender instanceof Player) {
                                    $sender->setScale(2);
                                    $sender->sendMessage(C::GRAY . "Changed ur scale to " . C::DARK_PURPLE . "2");
                                    return true;
                                }
                                switch ($args[0]) {
                                    case "3":
                                        if ($sender instanceof Player) {
                                            $sender->setScale(3);
                                            $sender->sendMessage(C::GRAY . "Changed ur scale to " . C::DARK_PURPLE . "3");
                                            return true;
                                        }
                                        switch ($args[0]) {
                                            case "4":
                                                if ($sender instanceof Player) {
                                                    $sender->setScale(4);
                                                    $sender->sendMessage(C::GRAY . "Changed ur scale to " . C::DARK_PURPLE . "4");
                                                    return true;
                                                }
                                        }
                                }
                        }
                }
        }
    }

                public function onDeath(PlayerDeathEvent $event)
                {
                 $p = $event->getPlayer();
                 $n = $p->getName();
                 if($p instanceof Player){
                     $cause = $p->getLastDamageCause();
                     if($cause instanceof EntityDamageByEntityEvent){
                         $killer = $cause->getDamager();
                         $killer->setHealth($killer->getHealth() + 20);
                         $killer->sendMessage(C::RED . "WarGames " . C::GRAY . "Sei stato curato per aver ucciso:" . C::RED . $p->getName());
                     }
                     $event->setDeathMessage(C::RED . $p->getName() . C::GRAY . " è stato killato da " . C::RED . $killer->getName());
                 }
                }
    }