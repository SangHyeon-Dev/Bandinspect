<?php

namespace Leader\Bandinspect\Addinspect;

use pocketmine\form\Form;
use Leader\Bandinspect\Main;
use ojy\band\BandReporter;
use pocketmine\Player;
use pocketmine\Server;
use Leader\Bandinspect\Addvalue\addBandvalue;

class addBandinspect implements Form {

    public function jsonSerialize() {
        return[
            "type" => "form",
            "title" => "§l§6< §f점검 시스템§6 >",
            "content" => "하실 작업을 선택해주세요.",
            "buttons" => [
            ["text" => "§l▶ 점검 시작\n- 점검을 시작합니다. -"],
            ["text" => "§l▶ 점검 종료\n- 점검을 종료합니다. -"]
            ]
        ];
    }

    public function handleResponse(Player $player, $data): void {
        $time = date("Y년 m월 d일 h시 i분");
        if($data == 0) {
            $player->sendForm(new addBandvalue());
        }
        if($data == 1) {
            BandReporter::addPost("[ 점검 시스템 ] #점검\n\n점검이 종료되었습니다.\n\n종료 시간 : {$time}");
            Server::getInstance()->getCommandMap()->dispatch($player,"whitelist off");
            Server::getInstance()->getCommandMap()->dispatch($player,"stop");
        }
    }
}
