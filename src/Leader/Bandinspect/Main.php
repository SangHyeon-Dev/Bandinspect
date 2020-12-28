<?php

namespace Leader\Bandinspect;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use Leader\Bandinspect\Addinspect\addBandinspect;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use ojy\band\BandReporter;
use pocketmine\Player;

class Main extends PluginBase implements Listener {

    public function onEnable() {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if($command == "점검") {
        if($sender->isOp()) {
            $this->onBandUI($sender);
        } else {
        return true;
        }
        }
        return true;
    }
    
    public function onBandUI(Player $player) {
    	$player->sendForm(new addBandinspect());
    }
}



