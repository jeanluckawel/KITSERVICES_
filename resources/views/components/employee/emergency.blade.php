<div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Emergency Contact</h3>

    <div class="flex flex-col md:flex-row gap-6">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Full Name <sup class="text-red-600">*</sup></span>
            <input name="full_name" required
                   value="{{ old('full_name', $emergency->full_name ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Relationship <sup class="text-red-600">*</sup></span>
            <input name="relationship" required
                   value="{{ old('relationship', $emergency->relationship ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Mobile Phone <sup class="text-red-600">*</sup></span>
            <input name="mobile_phone" required
                   value="{{ old('mobile_phone', $emergency->mobile_phone ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="mt-4">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Address <sup class="text-red-600">*</sup></span>
            <input name="address" required
                   value="{{ old('address', $emergency->address ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">City <sup class="text-red-600">*</sup></span>
            <input name="city" required
                   value="{{ old('city', $emergency->city ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>
</div>
