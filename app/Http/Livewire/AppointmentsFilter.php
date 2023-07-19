<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentsFilter extends Component
{
    public $appointments;
    public $sort;
    public $name;

    public $status_pending=true;
    public $status_rejected=true;
    public $status_accepted=true;


    public function updateContent()
    {
        $query = Appointment::where(function ($query) {
            $query->where("fname", "LIKE", "%" . $this->name . "%")
                ->orWhere("lname", "LIKE", "%" . $this->name . "%")
                ->orWhere("email", "LIKE", "%" . $this->name . "%")
                ->orWhere("mobile", "LIKE", "%" . $this->name . "%")
                ->orWhere("id", "LIKE", "%" . $this->name . "%");
        });

        $statusFilters = [];

        if ($this->status_pending) {
            $statusFilters[] = 'pending';
        }

        if ($this->status_rejected) {
            $statusFilters[] = 'rejected';
        }

        if ($this->status_accepted) {
            $statusFilters[] = 'accepted';
        }

        if (!empty($statusFilters)) {
            $query->whereIn("status", $statusFilters);
        }

        $this->appointments = $query->orderBy("date", $this->sort)
            ->orderBy("time", $this->sort)
            ->get();
    }

    public function mount(){
        $this->sort='desc';
        if(app('request')->input("id")){
            $this->appointments = Appointment::where("id",app('request')->input("id"))
            ->orderBy("date",$this->sort)
            ->orderBy("time",$this->sort)
            ->get();
            $this->name =app('request')->input("id");
        }
        else{

            $this->appointments = Appointment::orderBy("date",$this->sort)->orderBy("time",$this->sort)->get();
        }

    }
    public function render()
    {
        return view('livewire.appointments-filter');
    }
}
