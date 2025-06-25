<div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Company Information</h3>

    <div class="flex flex-col md:flex-row gap-6">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Job Title <sup class="text-red-600">*</sup></span>
            <input name="job_title" required
                   value="{{ old('job_title', $entreprise->job_title ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Department <sup class="text-red-600">*</sup></span>
            <input name="department" required
                   value="{{ old('department', $entreprise->department ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Function <sup class="text-red-600">*</sup></span>
            <input name="function" required
                   value="{{ old('function', $entreprise->function ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <div class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Status</span>
            <select name="status"
                    class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                <option value="Active" {{ old('status', $entreprise->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $entreprise->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="On Leave" {{ old('status', $entreprise->status ?? '') == 'On Leave' ? 'selected' : '' }}>On Leave</option>
            </select>
        </div>
    </div>
</div>
