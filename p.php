$shiftgroups = shiftgroup::get()->groupBy("worksheet_id");
        $dates = Calender::get();
        $a = [];
        foreach ($shiftgroups as $key=>$shiftgroup){
            $worksheet = worksheet::find($key);
            $clocks= $worksheet->hoursworks->pluck('id')->toArray();
            foreach ($dates as $num=>$date){
                foreach ($shiftgroup as $item){

                    $index = ($item->level + $num) % count($clocks);
//                    $item->hoursworks()->sync($clocks[$index],["calender"=>$date]);
//                    $date->shiftgroups()->attach($item->id,["hourswork_id"=>$clocks[$index]]);

                    $a[$date->id][$item->title] = $clocks[$index];

                }
            }
        }
        dd($a);
