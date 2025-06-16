<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
</div>

<div class="mb-4">
    <label for="staff_id" class="block text-sm font-medium text-gray-700">Staff ID</label>
    <input type="text" name="staff_id" id="staff_id" value="{{ old('staff_id', $user->staff_id ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
</div>

<div class="mb-4">
    <label for="rfid_id" class="block text-sm font-medium text-gray-700">RFID ID</label>
    <input type="text" name="rfid_id" id="rfid_id" value="{{ old('rfid_id', $user->rfid_id ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
</div>

<div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
</div>

<div class="mb-4">
    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
    <input type="text" name="position" id="position" value="{{ old('position', $user->position ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
</div>


