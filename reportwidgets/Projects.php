<?php namespace Indikator\Marketing\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use DB;

class Projects extends ReportWidgetBase
{
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'indikator.marketing::lang.menu.projects',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
            'total' => [
                'title'             => 'indikator.marketing::lang.widget.show_total',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'active' => [
                'title'             => 'indikator.marketing::lang.widget.show_active',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'inactive' => [
                'title'             => 'indikator.marketing::lang.widget.show_inactive',
                'default'           => true,
                'type'              => 'checkbox'
            ]
        ];
    }

    protected function loadData()
    {
        $this->vars['active'] = DB::table('marketing_projects')->where('status', 1)->count();
        $this->vars['inactive'] = DB::table('marketing_projects')->where('status', 2)->count();
        $this->vars['total'] = $this->vars['active'] + $this->vars['inactive'];
    }
}
