<?php
namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\{Room, Status, Task};

class TeamSpaceController extends Controller
{
    // Fitur 9 & 10: Team Space + Kanban Task
    public function show(Room $room)
    {
        $room->load('anggota.user');
        $statuses = Status::with(['tasks' => fn ($q) =>
            $q->where('room_id', $room->id)->with('anggota.user')->orderBy('due_date')])->get();

        return view('rooms.team-space', compact('room', 'statuses'));
    }

    public function storeTask(TaskRequest $request, Room $room)
    {
        $room->tasks()->create($request->validated() + ['created_by' => substr($request->user()->username ?? $request->user()->name, 0, 20)]);
        return back()->with('success', 'Task ditambahkan.');
    }

    public function updateTask(TaskRequest $request, Room $room, Task $task)
    {
        abort_unless($task->room_id === $room->id, 404);
        $task->update($request->validated());
        return back()->with('success', 'Task diperbarui.');
    }

    public function destroyTask(Room $room, Task $task)
    {
        abort_unless($task->room_id === $room->id, 404);
        $task->delete();
        return back()->with('success', 'Task dihapus.');
    }

    // Fitur 11: Project Resources (link grup/drive/figma/github) disimpan di room
    public function updateResources(\Illuminate\Http\Request $request, Room $room)
    {
        $data = $request->validate(['link_groupchat' => ['nullable', 'url', 'max:40']]);
        $room->update($data);
        return back()->with('success', 'Resource diperbarui.');
    }
}
