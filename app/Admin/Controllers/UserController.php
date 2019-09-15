<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);
        $grid->filter(function($filter){
            // 在这里添加字段过滤器
            $filter->like('grade', 'grade');
        });
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('序号'));
        $grid->column('name', __('姓名'));
        $grid->column('nickName', __('昵称'));
        $grid->column('sex', __('性别'))->using(['2' => '女', '1' => '男','0'=>'未知']);;
        $grid->column('student_id', __('学号'));
        $grid->column('phone', __('手机号'));
        $grid->column('openid', __('openid'));
        $grid->column('college', __('学院'));
        $grid->column('grade', __('年级'));

        $grid->column('updated_at', __('更新时间'));

        //禁用导出数据按钮
        $grid->disableExport();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('nickName', __('NickName'));
        $show->field('openid', __('openid'));
        $show->field('sex', __('Sex'));
        $show->field('phone', __('Phone'));
        $show->field('student_id', __('Student id'));
        $show->field('college', __('College'));
        $show->field('grade', __('Grade'));
        $show->field('class', __('Class'));
        $show->field('dormitory', __('Dormitory'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('name', __('Name'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token'));
        $form->text('nickName', __('NickName'));
        $form->text('openid', __('openid'));
        $form->select('sex' ,__('Sex'))->options([1 => '男', 2 => '女']);
        $form->text('phone', __('Phone'));
        $form->text('student_id', __('Student id'));
        $form->text('college', __('College'));
        $form->text('grade', __('Grade'));
        $form->text('class', __('Class'));
        $form->text('dormitory', __('Dormitory'));
        $form->footer(function ($footer) {
            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });
        return $form;
    }
}
