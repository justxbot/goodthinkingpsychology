<div class="appointments-table-container">

    <div class="filter-container">
        <div class="filter-sort">

            <h3><i class="fa-solid fa-sort" style="color: var(--secondary)"></i> SORT BY
            <select wire:model="sort" wire:change="updateContent">
                <option selected value="desc">FURTHEST</option>
                <option value="asc">CLOSEST</option>
            </select>
            APPOINTMENT DATE</h3>
        </div>
        <div class="filter-search">
                <i class="fa-brands fa-searchengin"></i>

            <input wire:model="name" wire:input="updateContent" type="text" placeholder="ID, Name, mobile, email ...."/>
        </div>
        <div class="filter-checkbox">
            <p onclick="moreFilters()" class="filter-checkbox-trigger"><i class="fa-solid fa-filter" style="color: var(--secondary);cursor:pointer"></i> More filters</p>
            <div class="filter-checkbox-dropdown">
                <div class="checkbox-tab">
                    <p>Pending</p><input wire:model="status_pending" wire:change="updateContent" type="checkbox" />
                </div>
                <div class="checkbox-tab">
                    <p>Accepted</p><input wire:model="status_accepted" wire:change="updateContent" type="checkbox" />
                </div>
                <div class="checkbox-tab">
                    <p>Rejected</p><input wire:model="status_rejected" wire:change="updateContent" type="checkbox" />
                </div>
            </div>
        </div>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>REQUESTED AT</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>HAD AN APPOINTMENT BEFORE</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
        </tr>

        @foreach ($appointments as $appointment )
        <tr key={{ $appointment->id }} @if ($loop->index%2==0)
            style="background-color:var(--secondary)"
        @endif>
            <td>{{ $appointment->id }}</td>
            <td>{{ $appointment->created_at }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ substr($appointment->time,0,5) }}</td>
            <td>{{ $appointment->fname." ".$appointment->lname}}</td>
            <td>{{ $appointment->email }}</td>
            <td>{{ $appointment->mobile }}</td>
            @if ( $appointment->hadAppointmentBefore )
                <td class="had"><i class="fa-solid fa-check"></i></td>
            @else
                <td class="hadnt"><i class="fa-solid fa-xmark"></i></td>
            @endif

            <td>{{ $appointment->status }}</td>

            <td class="actions-td">
                <i onclick="dropDownHandler()" class="fa-solid fa-bars dropdown-trigger"></i>
                <div class="dropdown-actions" id={{ uniqid()}}>
                    <form action="/admin/appointments/status_update" method="post">
                        @csrf
                        <input type="text" name="status" value="accepted" hidden>
                        <input type="numer" name="id" value="{{ $appointment->id }}" hidden>
                        <button type="submit" >Set as accepted <i class="fa-solid fa-check"></i></button>
                    </form>
                    <form action="/admin/appointments/status_update" method="post">
                        @csrf
                        <input type="text" name="status" value="rejected" hidden>
                        <input type="numer" name="id" value="{{ $appointment->id }}" hidden>
                        <button type="submit">Set as rejected <i class="fa-solid fa-xmark"></i></button>
                    </form>
                    <form action="/admin/appointments/status_update" method="post">
                        @csrf
                        <input type="text" name="status" value="pending" hidden>
                        <input type="numer" name="id" value="{{ $appointment->id }}" hidden>
                        <button type="submit">Set as pending <i class="fa-solid fa-clock"></i></button>
                    </form>
                    <form action="/admin/appointments/remove/{{ $appointment->id }}" method="post">
                        @csrf
                        <button type="submit">Remove <i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
  </table>
  <script>
    function dropDownHandler(){


            if(event.target.nextElementSibling.className=="dropdown-actions"){
                let dropdowns = document.querySelectorAll(".dropdown-actions-active")
                dropdowns.forEach(element => {
                element.className = "dropdown-actions"})
                event.target.nextElementSibling.className ="dropdown-actions dropdown-actions-active";
            }
            else{
                event.target.nextElementSibling.className ="dropdown-actions";
            }
    }
    function moreFilters(){
        let dropdown = document.querySelector(".filter-checkbox-dropdown")
        if(dropdown.className == "filter-checkbox-dropdown"){
            dropdown.className = "filter-checkbox-dropdown filter-checkbox-dropdown-active"
        }
        else{
            dropdown.className = "filter-checkbox-dropdown"
        }
    }

    </script>
</div>

