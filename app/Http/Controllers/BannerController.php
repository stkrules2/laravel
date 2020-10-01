<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{

    public function index()
    {
        $banner = Banner::first();
        return view('adminBanner', ['banner' => $banner]);
    }

    public function delete($id)
    {
        $values = Banner::first();

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
        return $id;
    }

    public function insert(Request $request)
    {
        $banner = Banner::first();
        $allowedfileExtension = ['pdf', 'jpg', 'png', 'gif'];
        if ($banner) {
            if ($request->hasFile('banner-img1')) {
                $files = $request->file('banner-img1');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/banner-images', 'public');
                    $banner->path1 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('banner-img2')) {
                $files = $request->file('banner-img2');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/banner-images', 'public');
                    $banner->path2 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('banner-img3')) {
                $files = $request->file('banner-img3');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/banner-images', 'public');
                    $banner->path3 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('banner-img4')) {
                $files = $request->file('banner-img4');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/banner-images', 'public');
                    $banner->path4 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            if ($request->hasFile('banner-img5')) {
                $files = $request->file('banner-img5');
                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $filename = $files->store('images/banner-images', 'public');
                    $banner->path5 = $filename;
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
            $banner->save();
            return redirect('admin/banner');
        }

        $banner1 = new Banner();
        if ($request->hasFile('banner-img1')) {
            $files = $request->file('banner-img1');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/banner-images', 'public');
                $banner1->path1 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('banner-img2')) {
            $files = $request->file('banner-img2');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/banner-images', 'public');
                $banner1->path2 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('banner-img3')) {
            $files = $request->file('banner-img3');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/banner-images', 'public');
                $banner1->path3 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('banner-img4')) {
            $files = $request->file('banner-img4');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/banner-images', 'public');
                $banner1->path4 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }
        if ($request->hasFile('banner-img5')) {
            $files = $request->file('banner-img5');
            $filename = $files->getClientOriginalName();
            $extension = $files->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {
                $filename = $files->store('images/banner-images', 'public');
                $banner1->path5 = $filename;
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }
        }

        $banner1->save();
        return redirect('admin/banner');
    }
}