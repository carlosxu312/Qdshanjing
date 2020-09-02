<?php

namespace Tests\Browser\Pages;

use App\Model\Message;
use Laravel\Dusk\Browser;
use Tests\Browser\Components\Form\MenuCreationForm;

class MessagePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return admin_base_path('message');
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param \Laravel\Dusk\Browser $browser
     * @return void
     * @throws \Facebook\WebDriver\Exception\TimeOutException
     */
    public function assert(Browser $browser)
    {
        $browser->assertSeeIn('#app > div > div > div > div.box-footer.clearfix > span > b:nth-child(3)',count(Message::all()));
    }

    /**
     * 创建.
     *
     * @param Browser $browser
     * @param array $input
     *
     * @return Browser
     */
    public function newMenu(Browser $browser, array $input)
    {
        return $browser->within(new MenuCreationForm(), function (Browser $browser) use ($input) {
            $browser->fill($input);

            $browser->pressAndWaitFor(__('admin.submit'), 2);
            $browser->waitForLocation($this->url(), 2);
        });
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@tree' => '.dd',
            '@form' => 'form[method="POST"]',
        ];
    }
}
