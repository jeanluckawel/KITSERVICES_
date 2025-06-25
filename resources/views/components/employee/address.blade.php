<div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Address Information</h3>

    <div class="flex flex-col md:flex-row gap-6">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">House Phone</span>
            <input name="house_phone"
                   value="{{ old('house_phone', $address->house_phone ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Mobile Phone <sup class="text-red-600">*</sup></span>
            <input name="mobile_phone" required
                   value="{{ old('mobile_phone', $address->mobile_phone ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Email <sup class="text-red-600">*</sup></span>
            <input name="email" type="email" required
                   value="{{ old('email', $address->email ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="mt-4">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Address Line 1 <sup class="text-red-600">*</sup></span>
            <input name="address1" required
                   value="{{ old('address1', $address->address1 ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="mt-4">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Address Line 2</span>
            <input name="address2"
                   value="{{ old('address2', $address->address2 ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">City <sup class="text-red-600">*</sup></span>
            <input name="city" required
                   value="{{ old('city', $address->city ?? '') }}"
                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>
</div>
