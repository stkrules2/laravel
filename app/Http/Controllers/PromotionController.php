<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotion = Promotion::first();
        return view('adminPromotion', ['promotion' => $promotion]);
    }
    public function delete($id)
    {
        $values = Promotion::first();
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
            }
        }
        return 'Success';
    }
    public function insert(Request $request)
    {
        $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
        $promotion = Promotion::first();
        if ($promotion) {

            if ($request->hasFile('promotion-img1')) {
                $files = $request->file('promotion-img1');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/promotion-images', 'public');
                    $promotion->path1 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('promotion-img2')) {
                $files = $request->file('promotion-img2');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/promotion-images', 'public');
                    $promotion->path2 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('promotion-img3')) {
                $files = $request->file('promotion-img3');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/promotion-images', 'public');
                    $promotion->path3 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }

            $promotion->save();
            return redirect('admin/promotion');
        }
        $promotion1 = new Promotion();
        if ($request->hasFile('promotion-img1')) {
            $files = $request->file('promotion-img1');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/promotion-images', 'public');
                $promotion1->path1 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('promotion-img2')) {
            $files = $request->file('promotion-img2');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/promotion-images', 'public');
                $promotion1->path2 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('promotion-img3')) {
            $files = $request->file('promotion-img3');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/promotion-images', 'public');
                $promotion1->path3 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }

        $promotion1->save();
        return redirect('admin/promotion');
    }
}