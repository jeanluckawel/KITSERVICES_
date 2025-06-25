<div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Children Information</h3>

    <div class="flex flex-col md:flex-row gap-6">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">First Name <sup class="text-red-600">*</sup></span>
            <input name="first_name" required

                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Last Name <sup class="text-red-600">*</sup></span>
            <input name="last_name" required

                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <div class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Gender <sup class="text-red-600">*</sup></span>
            <div class="flex space-x-6 mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input name="gender" type="radio" required value="M"
                           class="text-orange-600 form-radio focus:ring-2 focus:ring-orange-500" />
                    <span class="ml-2">Male</span>
                </label>
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input name="gender" type="radio" value="F"

                           class="text-orange-600 form-radio focus:ring-2 focus:ring-orange-500" />
                    <span class="ml-2">Female</span>
                </label>
            </div>
        </div>

        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Birth Date</span>
            <input name="birthday" type="date"

                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>
    </div>

    <div class="flex flex-col md:flex-row gap-6 mt-4">
        <label class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Age</span>
            <input name="age" type="number"

                   class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
        </label>

        <div class="block text-sm flex-1">
            <span class="text-gray-700 dark:text-gray-400">Children Status</span>
            <select name="children_status"
                    class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                 </select>
        </div>
    </div>
</div>
