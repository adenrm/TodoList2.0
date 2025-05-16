<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <!-- User Management Tables -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">User Management</h3>
                        <button id="btnAddUser" class="mb-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add New User
                        </button>
                        
                        <!-- Admin Users Table -->
                        <div class="mb-6">
                            <h4 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Admin Users</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg overflow-hidden">
                                    <thead class="bg-gray-100 dark:bg-gray-600">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Created at</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Updated at</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-500">
                                        @foreach($adminUsers as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->created_at->format('h:i, j F Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->updated_at->diffForHumans() }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                                <button onclick="editUser({{ $user->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</button>
                                                <button onclick="deleteUser({{ $user->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Penugas Users Table -->
                        <div class="mb-6">
                            <h4 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Penugas Users</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg overflow-hidden">
                                    <thead class="bg-gray-100 dark:bg-gray-600">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-500">
                                        @foreach($penugasUsers as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                                <button onclick="editUser({{ $user->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</button>
                                                <button onclick="deleteUser({{ $user->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pelaksana Users Table -->
                        <div class="mb-6">
                            <h4 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Pelaksana Users</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg overflow-hidden">
                                    <thead class="bg-gray-100 dark:bg-gray-600">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Email</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-500">
                                        @foreach($pelaksanaUsers as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                                <button onclick="editUser({{ $user->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</button>
                                                <button onclick="deleteUser({{ $user->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Todo Management Table -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Todo Management</h3>
                        <button class="mb-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add New Todo
                        </button>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg overflow-hidden">
                                <thead class="bg-gray-100 dark:bg-gray-600">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Assigned To</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Due Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-500">
                                    @foreach($todos as $todo)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $todo->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $todo->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $todo->assigned_to }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $todo->due_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                            <button onclick="editTodo({{ $todo->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</button>
                                            <button onclick="deleteTodo({{ $todo->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Roles Management Table -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Roles Management</h3>
                        <button class="mb-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add New Role
                        </button>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white dark:bg-gray-700 rounded-lg overflow-hidden">
                                <thead class="bg-gray-100 dark:bg-gray-600">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Role Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Description</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Users Count</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-500">
                                    @foreach($roles as $role)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $role->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $role->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $role->users_count }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                                            <button onclick="editRole({{ $role->id }})" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">Edit</button>
                                            <button onclick="deleteRole({{ $role->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal for Add/Edit User -->
                <div id="userModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 mb-4">User Form</h3>
                            <form id="userForm" method="POST" action="{{route('admin.store')}}">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                    <input type="text" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                    <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan</label>
                                    <input type="text" name="jabatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                    <select name="role_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Penugas</option>
                                        <option value="3">Pelaksana</option>
                                    </select>
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" onclick="closeUserModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal for Edit User -->
                <div id="editUserModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 mb-4">User Form</h3>
                            <form id="userForm" method="POST" action="{{route('admin.store')}}">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                    <input value="{{$user->name}}" type="text" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                    <input type="password" name="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jabatan</label>
                                    <input type="text" name="jabatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                                    <select name="role_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Penugas</option>
                                        <option value="3">Pelaksana</option>
                                    </select>
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" onclick="closeEditUserModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal for Add/Edit Todo -->
                <div id="todoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 mb-4">Todo Form</h3>
                            <form id="todoForm">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                    <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="pending">Pending</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Due Date</label>
                                    <input type="date" name="due_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" onclick="closeTodoModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal for Add/Edit Role -->
                <div id="roleModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-200 mb-4">Role Form</h3>
                            <form id="roleForm">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role Name</label>
                                    <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                    <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" onclick="closeRoleModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                    // User CRUD functions
                    document.getElementById('btnAddUser').addEventListener('click', function() {
                        // Reset form when opening for a new user
                        document.getElementById('userForm').reset();
                        document.getElementById('userModal').classList.remove('hidden');
                    });
                    
                    function editUser(id) {
                        // Implement edit user logic
                        
                        document.getElementById('editUserModal').classList.remove('hidden');
                    }

                    function deleteUser(id) {
                        if(confirm('Are you sure you want to delete this user?')) {
                            // Implement delete user logic
                        }
                    }

                    function closeEditUserModal() {
                        document.getElementById('editUserModal').classList.add('hidden');
                    }

                    function closeUserModal() {
                        document.getElementById('userModal').classList.add('hidden');
                    }

                    // Todo CRUD functions
                    function editTodo(id) {
                        document.getElementById('todoModal').classList.remove('hidden');
                    }

                    function deleteTodo(id) {
                        if(confirm('Are you sure you want to delete this todo?')) {
                            // Implement delete todo logic
                        }
                    }

                    function closeTodoModal() {
                        document.getElementById('todoModal').classList.add('hidden');
                    }

                    // Role CRUD functions
                    function editRole(id) {
                        document.getElementById('roleModal').classList.remove('hidden');
                    }

                    function deleteRole(id) {
                        if(confirm('Are you sure you want to delete this role?')) {
                            // Implement delete role logic
                        }
                    }

                    function closeRoleModal() {
                        document.getElementById('roleModal').classList.add('hidden');
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
