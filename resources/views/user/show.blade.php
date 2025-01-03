<x-master>
    <div>
        <form method="POST" action="{{ route('user.update', $a_user) }}" id="update"
            style="width: 90%; margin-left:auto;margin-right:auto;margin-bottom: 2.5rem;margin-top: 2.5rem"
            class="row g-3">
            @csrf
            @method('PUT')
            <span style="color: white;font-size: x-large">Account Info</span>
            <div class="col-md-6">
                <label for="input4" class="form-label">Name</label>
                <input type="text" class="form-control" id="input4" name="name" value='{{ $a_user->name }}'
                    style="font-size: large">
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email" style="font-size: large"
                    value="{{ $a_user->email }}">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password"
                    style="font-size: large">
            </div>
            <div style="display:flex;justify-content:left;">
                <div style="margin-right: 5rem">
                    <button form="update" style="font-size: larger" type="submit"
                        class="btn btn-primary">Update</button>
                </div>
                <div style="margin-right: 5rem">
                    <a style="font-size: larger" href="{{ route('logout.user') }}" class="btn btn-primary">Log Out</a>
                </div>
                <div style="margin-right: 5rem">
                    <a style="font-size: larger" href="{{ route('user.destroy', $a_user) }}"
                        class="btn btn-primary">Delete Account</a>
                </div>
            </div>
        </form>
        <hr style="color: white">
        @if ($a_user->customer)
            <form action="{{ route('customer.update', $a_user->customer) }}" method="POST"
                style="width: 90%; margin-left:auto;margin-right:auto;margin-bottom: 2.5rem;margin-top: 2.5rem"
                class="row g-3">
                @csrf
                @method('PUT')
                <span style="color: white;font-size: x-large">Customer Info</span>
                <div class="col-md-6">
                    <label for="input4" class="form-label">First Name</label>
                    <input style="font-size: medium" type="text" class="form-control" name="first_name"
                        id="input4" value="{{ $a_user->customer->first_name }}">
                </div>
                <div class="col-md-6">
                    <label for="input4" class="form-label">Last Name</label>
                    <input style="font-size: medium" type="text" class="form-control" name="last_name" id="input4"
                        value="{{ $a_user->customer->last_name }}">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Location</label>
                    <input style="font-size: medium" type="text" class="form-control" id="inputAddress"
                        placeholder="1234 Main St" name="location" value="{{ $a_user->customer->location }}">
                </div>
                <div class="col-6">
                    <label for="input2" class="form-label">Phone</label>
                    <input style="font-size: medium" type="text" class="form-control" id="input2"
                        placeholder="+963---------" name="phone" value="{{ $a_user->customer->phone }}">
                </div>
                <div class="col-md-6">
                    <label for="inputBalance" class="form-label">Balance</label>
                    <input disabled style="font-size: medium" type="text" class="form-control" id="inputBalance"
                        value="{{ $a_user->customer->balance == null ? 0 : $a_user->customer->balance }}">
                </div>
                <div class="col-md-6">
                    <label for="date">Birth</label>
                    <input style="font-size: medium" type="date" name="birth" class="form-control"
                        id="date" name="date" value="{{ $a_user->customer->birth }}">
                </div>

                <div class="col-12">
                    <button style="font-size: medium" type="submit" class="btn btn-primary">Update</button>
                </div>


            </form>
        @else
            <form action="{{ route('customer.store') }}" method="POST"
                style="width: 90%; margin-left:auto;margin-right:auto;margin-bottom: 2.5rem;margin-top: 2.5rem"
                class="row g-3">
                @csrf
                @method('POST')
                <span style="color: white;font-size: x-large">Customer Info</span>
                <div class="col-md-6">
                    <label for="input4" class="form-label">First Name</label>
                    <input style="font-size: medium" type="text" placeholder="Joe" class="form-control" name="first_name"
                        id="input4">
                </div>
                <div class="col-md-6">
                    <label for="input4" class="form-label">Last Name</label>
                    <input style="font-size: medium" type="text" placeholder="Doe" class="form-control" name="last_name"
                        id="input4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Location</label>
                    <input style="font-size: medium" type="text" class="form-control" id="inputAddress"
                        placeholder="1234 Main St" name="location">
                </div>
                <div class="col-6">
                    <label for="input2" class="form-label">Phone</label>
                    <input style="font-size: medium" type="text" class="form-control" id="input2"
                        placeholder="+963---------" name="phone">
                </div>
                <div class="col-md-6">
                    <label for="inputBalance" class="form-label">Balance</label>
                    <input disabled style="font-size: medium" type="text" class="form-control" id="inputBalance">
                </div>
                <div class="col-md-6">
                    <label for="date">Birth</label>
                    <input style="font-size: medium" type="date" name="birth" class="form-control"
                        id="date" name="date" }}">
                </div>

                <div class="col-12">
                    <button style="font-size: medium" type="submit" class="btn btn-primary">Add</button>
                </div>


            </form>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-master>
