<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
{
    public function index()
    {
        $history = History::first();
        return view('adminHistory', ['history' => $history]);
    }
    public function delete($id)
    {
        $values = History::first();
        if ($values) {
            if ($id == 1) {
                $values->path1 = null;
                $values->save();
            } elseif ($id == 2) {
                $values->path2 = null;
                $values->save();
            } elseif ($id == 3) {
                $values->path3 = null;
                $values->save();
            } elseif ($id == 4) {
                $values->path4 = null;
                $values->save();
            } elseif ($id == 5) {
                $values->path5 = null;
                $values->save();
            }
        }
        return 1;
    }
    public function insert(Request $request)
    {
        $request->validate([
            'history-description' => 'required | min:3',
            'history-img1' => 'required',
        ]);
        $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
        $history = History::first();
        if ($history) {
            $history->description = $request->input('history-description');
            if ($request->hasFile('history-img1')) {
                $files = $request->file('history-img1');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/history-images', 'public');
                    $history->path1 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('history-img2')) {
                $files = $request->file('history-img2');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/history-images', 'public');
                    $history->path2 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('history-img3')) {
                $files = $request->file('history-img3');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/history-images', 'public');
                    $history->path3 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('history-img4')) {
                $files = $request->file('history-img4');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/history-images', 'public');
                    $history->path4 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('history-img5')) {
                $files = $request->file('history-img5');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/history-images', 'public');
                    $history->path5 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            $history->save();
            return redirect('admin/history');
        }
        $history1 = new History();
        $history1->description = $request->input('history-description');
        if ($request->hasFile('history-img1')) {
            $files = $request->file('history-img1');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/history-images', 'public');
                $history1->path1 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('history-img2')) {
            $files = $request->file('history-img2');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/history-images', 'public');
                $history1->path2 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('history-img3')) {
            $files = $request->file('history-img3');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/history-images', 'public');
                $history1->path3 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('history-img4')) {
            $files = $request->file('history-img4');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/history-images', 'public');
                $history1->path4 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('history-img5')) {
            $files = $request->file('history-img5');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/history-images', 'public');
                $history1->path5 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }

        $history1->save();
        return redirect('admin/history');
    }
}