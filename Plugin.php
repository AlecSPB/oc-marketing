<?php namespace Indikator\Marketing;

use System\Classes\PluginBase;
use Backend;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'indikator.marketing::lang.plugin.name',
            'description' => 'indikator.marketing::lang.plugin.description',
            'author'      => 'indikator.marketing::lang.plugin.author'
        ];
    }

    public function registerNavigation()
    {
        return [
            'marketing' => [
                'label'       => 'indikator.marketing::lang.menu.marketing',
                'url'         => Backend::url('indikator/marketing/tasks'),
                'icon'        => 'icon-bar-chart',
                'permissions' => ['indikator.marketing.*'],
                'order'       => 500,

                'sideMenu' => [
                    'tasks' => [
                        'label' => 'indikator.marketing::lang.menu.tasks',
                        'url'   => Backend::url('indikator/marketing/tasks'),
                        'icon'  => 'icon-tags'
                    ],
                    'ads' => [
                        'label' => 'indikator.marketing::lang.menu.ads',
                        'url'   => Backend::url('indikator/marketing/ads'),
                        'icon'  => 'icon-file'
                    ],
                    'posts' => [
                        'label' => 'indikator.marketing::lang.menu.posts',
                        'url'   => Backend::url('indikator/marketing/posts'),
                        'icon'  => 'icon-comments'
                    ],
                    'projects' => [
                        'label' => 'indikator.marketing::lang.menu.projects',
                        'url'   => Backend::url('indikator/marketing/projects'),
                        'icon'  => 'icon-tasks'
                    ],
                    'clients' => [
                        'label' => 'indikator.marketing::lang.menu.clients',
                        'url'   => Backend::url('indikator/marketing/clients'),
                        'icon'  => 'icon-users'
                    ]
                ]
            ]
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'indikator.marketing::mail.report_en' => 'Report',
            'indikator.marketing::mail.report_hu' => 'Jelentés'
        ];
    }

    public function registerPermissions()
    {
        return [
            'indikator.marketing.tasks'    => ['tab' => 'indikator.marketing::lang.menu.marketing', 'label' => 'indikator.marketing::lang.permission.tasks'],
            'indikator.marketing.ads'      => ['tab' => 'indikator.marketing::lang.menu.marketing', 'label' => 'indikator.marketing::lang.permission.ads'],
            'indikator.marketing.posts'    => ['tab' => 'indikator.marketing::lang.menu.marketing', 'label' => 'indikator.marketing::lang.permission.posts'],
            'indikator.marketing.projects' => ['tab' => 'indikator.marketing::lang.menu.marketing', 'label' => 'indikator.marketing::lang.permission.projects'],
            'indikator.marketing.clients'  => ['tab' => 'indikator.marketing::lang.menu.marketing', 'label' => 'indikator.marketing::lang.permission.clients']
        ];
    }
}
