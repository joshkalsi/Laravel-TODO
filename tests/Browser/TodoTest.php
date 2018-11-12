<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TodoTest extends DuskTestCase
{

    use DatabaseMigrations;

    public function testCreationCompletionAndDeletionOfTaskFromTaskList()
    {

        $this->browse(function ($browser) {
            $browser->visit('tasks')
                ->type('#task-name', 'New Dusk Test')
                ->keys('#due_at', '15-11-2018')
                ->press('Add Task')
                ->assertPathIs('/tasks')
                ->assertSee('New Dusk Test')
                ->press('Completed')
                ->assertPathIs('/tasks')
                ->press('Delete')
                ->assertPathIs('/tasks');
        });
    }

    public function testDeletionOfTaskFromTaskView() {
        $this->browse(function ($browser) {
            $browser->visit('tasks')
                ->type('#task-name', 'New Dusk Test')
                ->keys('#due_at', '15-11-2018')
                ->press('Add Task')
                ->assertPathIs('/tasks')
                ->assertSee('New Dusk Test')
                ->click('@task')
                ->assertPathIs('/tasks/1')
                ->press('Delete')
                ->assertPathIs('/tasks');
        });
    }

    public function testEditTask()
    {
        $this->browse(function ($browser) {
            $browser->visit('tasks')
                ->type('#task-name', 'New Dusk Test')
                ->keys('#due_at', '15-11-2018')
                ->press('Add Task')
                ->assertPathIs('/tasks')
                ->assertSee('New Dusk Test')
                ->click('@task')
                ->assertPathIs('/tasks/1')
                ->click('@edit')
                ->type('@edit-name', 'Edited Dusk Test')
                ->keys('@edit-due_at', '01-01-2020')
                ->press('Save')
                ->assertPathIs('/tasks/1')
                ->assertSee('Edited Dusk Test')
                ->assertSee('01/01/2020');
        });
    }

}
