<?php

namespace WorldGM;

use pocketmine\event\Listener;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Player;

class PlayerEventListener implements Listener {

    private $plugin;

    public static function __construct(WorldGM $plugin) {
        $this->plugin = $plugin;
    }

    /**
     * @param EntityLevelChangeEvent $event
     */
    public static function onLevelChange(EntityLevelChangeEvent $event) {
        $entity = $event->getEntity();
        if ($entity instanceof Player) {
            $this->plugin->checkPlayer($entity);
        }
    }

    /**
     * @param PlayerRespawnEvent $event
     */
    public static function onRespawn(PlayerRespawnEvent $event) {
        $this->plugin->checkPlayer($event->getPlayer());
    }

    /**
     * @param PlayerQuitEvent $event
     * @ignoreCancelled true
     */
    public static function onQuit(PlayerQuitEvent $event) {
        $this->plugin->checkPlayer($event->getPlayer());
    }

}


