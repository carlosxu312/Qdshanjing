<?php

namespace Tests\Browser;

use App\Model\Message;
use Dcat\Admin\Models\Administrator;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\MessageEditPage;
use Tests\Browser\Pages\MessagePage;
use Tests\DuskTestCase;

class MessageTest extends DuskTestCase
{
    /**
     * 测试留言列表
     *
     * @return void
     * @throws \Throwable
     */
    public function testMessageIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(Administrator::first(),'admin')
                ->visit(new MessagePage());
        });
    }

    /**
     * 测试留言修改
     * @throws \Throwable
     */

    public function testEditMenu()
    {
        $this->browse(function (Browser $browser) {
            $newName = 'haha';

            $browser->visit(new MessageEditPage(3));

            $browser->script("$(\"input[name='name']\").val(\"{$newName}\")");

            $browser->press(__('admin.submit'))
                ->waitForLocation(admin_base_path('message'), 2);

            $message = Message::where(['name' => $newName])->get();
            $browser->assertSee($newName);
        });
    }
}
