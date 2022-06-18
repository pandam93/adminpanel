<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    /**
     * Get random notification data for a notification item.
     *
     * @param Request $request
     * @return Array
     */
    public function getNotificationsData()
    {
                // Create array of available colors.

                $colors = [
                    'light', 'dark','primary', 'secondary',
                    'info', 'success', 'warning', 'danger'
                ];
        
                // Create a notifications array of data.
        
                $notifications = [
                    [
                        'icon' => 'fas fa-fw fa-envelope',
                        'text' => rand(0, 10) . ' new messages',
                        'time' => rand(0, 10) . ' minutes',
                        'link' => '/messages/all'
                    ],
                    [
                        'icon' => 'fas fa-fw fa-users text-primary',
                        'text' => rand(0, 10) . ' friend requests',
                        'time' => rand(0, 60) . ' minutes',
                        'link' => '/friend-requests'
                    ],
                    [
                        'icon' => 'fas fa-fw fa-file text-danger',
                        'text' => rand(0, 10) . ' new reports',
                        'time' => rand(0, 60) . ' minutes',
                        'link' => '/profile/reports'
                    ],
                ];
        
                // Create the notification dropdown content.
        
                $dropdownHtml = '';
                foreach ($notifications as $key => $not) {
                    $icon = "<i class='mr-2 {$not['icon']}'></i>";
        
                    $time = "<span class='float-right text-muted text-sm'>
                               {$not['time']}
                             </span>";
        
                    $dropdownHtml .= "<a href='{$not['link']}' class='dropdown-item'>
                                        {$icon}{$not['text']}{$time}
                                      </a>";
        
                    if ($key < count($not)) {
                        $dropdownHtml .= "<div class='dropdown-divider'></div>";
                    }
                }
        
                // Return the new notification data.
        
                return [
                    'label'       => rand(0, 10),
                    'label_color' => $colors[rand(0, 7)],
                    'icon_color'  => $colors[rand(0, 7)],
                    'dropdown'    => $dropdownHtml,
                ];
    }
}
