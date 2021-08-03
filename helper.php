<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_mmanager_events
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Date\Date;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

class ModMManagerMyregistrationsHelper{

    public static function getRegistrations(){
        $user = Factory::getUser();
        try{
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);

            $query->select(array('a.*','b.name'));
            $query->from($db->quoteName('#__nxmarathonmanager_registration','a'));
            $query->where($db->quoteName('a.created_by') . ' = ' . $db->quote($user->id));
            $query->join('LEFT', $db->quoteName('#__nxmarathonmanager_event', 'b') . ' ON ' . $db->quoteName('a.eventid') . ' = ' . $db->quoteName('b.id'));
            $query->order('a.created DESC');
            $query->setLimit(10);
            $db->setQuery($query);
            return $db->loadObjectList();

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function unixToDate($unix){
        $date = new Date($unix);
        return $date->format('d.M.Y');
    }

    public static function publicTransportReduction($type){
        switch($type){
            case '0':
            default:
                $reduct = 'keine';
                break;
            case 'ga':
                $reduct = 'GA';
                break;
            case 'ht':
                $reduct = 'Halbtax';
        }
        return $reduct;
    }

    public static function arrivalTypes($type){
        switch($type){
            case 'car':
                $arriveBy = 'Auto';
                break;
            case 'public':
                $arriveBy = 'ÖV';
                break;
            case 'both':
            default:
                $arriveBy = 'beides';
        }
        return $arriveBy;
    }

    /**
     * Reads the information for a certain category and returns its details
     *
     * @param $catId            ID of the category
     * @return stdClass         Category Identification number & Category label
     */
    public static function getCategoryInfo($catId = NULL){
        if($catId) {
            try {
                $category = new stdClass();

                $db = JFactory::getDbo();
                $query = $db->getQuery(true);

                $query->select('*');
                $query->from($db->quoteName('#__nxmarathonmanager_teamcategory'));
                $query->where($db->quoteName('id') . ' = ' . $db->quote($catId));
                $db->setQuery($query);
                $cat = $db->loadObject();

                if($cat){
                    $category->catId = (int) $cat->event_main_catid;
                    $category->labeledId = (string) $cat->event_main_catid . '.' . $cat->event_group_catid;
                    $category->label = (string) $cat->name;
                }else{
                    return false;
                }

                return $category;

            } catch (Exception $e) {
                return $e->getMessage();
            }
        }else{
            return false;
        }
    }

}