<?php namespace Modules\Carrental\Entities\Car;


class HorsePower
{
    const M50BG = 1;
    const L51M75BG = 2;
    const L76M100BG = 3;
    const L101M125BG = 4;
    const L126M150BG = 5;
    const L151M175BG = 6;
    const L176M200BG = 7;
    const L201M225BG = 8;
    const L226M250BG = 9;
    const L251M275BG = 10;
    const L276M300BG = 11;
    const L301M325BG = 12;
    const L326M350BG = 13;
    const L351M375BG = 14;
    const L376M400BG = 15;
    const L401M425BG = 16;
    const L426M450BG = 17;
    const L451M475BG = 18;
    const L476M500BG = 19;
    const L501M525BG = 20;
    const L526M550BG = 21;
    const L551M575BG = 22;
    const L576M600BG = 23;
    const M600BG = 24;

    private $horsepowers = [];

    public function __construct()
    {
        $this->horsepowers = [
            self::M50BG => "50 BG'ye kadar",
            self::L51M75BG => "51-75 BG",
            self::L76M100BG => "76-100 BG",
            self::L101M125BG => "101-125 BG",
            self::L126M150BG => "126-150 BG",
            self::L151M175BG => "151-175 BG",
            self::L176M200BG => "176-200 BG",
            self::L201M225BG => "201-225 BG",
            self::L226M250BG => "226-250 BG",
            self::L251M275BG => "251-275 BG",
            self::L276M300BG => "276-300 BG",
            self::L301M325BG => "301-325 BG",
            self::L326M350BG => "326-350 BG",
            self::L351M375BG => "351-375 BG",
            self::L376M400BG => "376-400 BG",
            self::L401M425BG => "401-425 BG",
            self::L426M450BG => "426-450 BG",
            self::L451M475BG => "451-475 BG",
            self::L476M500BG => "476-500 BG",
            self::L501M525BG => "501-525 BG",
            self::L526M550BG => "526-550 BG",
            self::L551M575BG => "551-575 BG",
            self::L576M600BG => "576-600 BG",
            self::M600BG => "> 600 BG",
        ];
    }

    public function lists()
    {
        return $this->horsepowers;
    }

    public function get($horsepowerId)
    {
        if(isset($horsepowerId)) {
            return $this->horsepowers[$horsepowerId];
        }
        return $this->horsepowers[self::M50BG];
    }
}