<?php

namespace Leader\Bandinspect\Addvalue;

use pocketmine\form\Form;
use pocketmine\Player;
use pocketmine\Server;
use ojy\band\BandReporter;
use Leader\Bandinspect\Main;
use Leader\Bandinspect\Addinspect\addBandinspect;

class addBandvalue implements Form {

    public function jsonSerialize() {
        return [
            "type" => "custom_form",
            "title" => "§l§6< §f점검 시스템§6 >",
            "content" => [
                [
                    "type" => "input",
                    "text" => "§l▶ 점검 사유를 적어주세요.",
                    "placeholder" => "ex. 버그"
                ],
                [
                    "type" => "input",
                    "text" => "§l▶점검 시간을 적어주세요.\n- 시각의 단위를 적어주세요. -",
                    "placeholder" => "ex. 1분 or 1시간"
                ]
            ]
        ];
    }

    public function handleResponse(Player $player, $data): void {
            $time = date("Y년 m월 d일 h시 i분");
            if($data === null) return;
            BandReporter::addPost("[ 점검 시스템 ] #점검\n\n점검이 시작되었습니다.\n\n점검 사유 : {$data[0]}\n\n점검 시간 : {$time} ~ {$data[1]}");
            Server::getInstance()->getCommandMap()->dispatch($player,"whitelist on");
            Server::getInstance()->getCommandMap()->dispatch($player,"stop");
     }
}
    
