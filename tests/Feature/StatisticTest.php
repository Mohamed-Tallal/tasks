<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\Statistic;
use App\Jobs\UpdateStatisticsJob;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatisticTest extends TestCase
{
    use RefreshDatabase;

    public function test_statistics_are_displayed_correctly()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        Task::factory()->count(3)->create(['assigned_to_id' => $user1->id]);
        Task::factory()->count(2)->create(['assigned_to_id' => $user2->id]);

        $response = $this->get('/statistics');
        $response->assertStatus(200);


        $response->assertViewIs('statistic');

        $statistics = $response->viewData('statistics');
        $this->assertCount(2, $statistics);

        $this->assertEquals(3, $statistics->firstWhere('user_id', $user1->id)->tasks_count);
        $this->assertEquals(2, $statistics->firstWhere('user_id', $user2->id)->tasks_count);
    }

    public function test_statistics_page_displays_message_when_no_statistics()
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);

        $response->assertSeeText('there is no statistics');
    }

}
