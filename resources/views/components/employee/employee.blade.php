
<form method="POST" enctype="multipart/form-data">
    @csrf


    <div id="employee-section">
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <!-- Name Fields -->
            <div class="flex flex-col md:flex-row gap-6">
                <label class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">First Name <sup class="text-red-600">*</sup></span>
                    <input name="first_name" required
                           value="
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Last Name <sup class="text-red-600">*</sup></span>
                    <input name="last_name" required
                           value="
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Middle Name <sup class="text-red-600">*</sup></span>
                    <input name="middle_name" required
                           value="
                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>
            </div>

            <!-- Personal Info -->
            <div class="flex flex-col md:flex-row gap-6 mt-4">
                <label class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Personal ID</span>
                    <input name="personal_id"

                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Birth Date</span>
                    <input name="birth_date" type="date"

                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>

                <label class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Nationality</span>
                    <input name="nationality" type="text"

                           class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
                </label>
            </div>

            <!-- Gender and Marital Status -->
            <div class="flex flex-col md:flex-row gap-6 mt-4">
                <div class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Gender <sup class="text-red-600">*</sup></span>
                    <div class="flex space-x-6 mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input name="gender" type="radio" required value="M"

                                   class="text-orange-500 form-radio focus:ring-2 focus:ring-orange-500" />
                            <span class="ml-2">M</span>
                        </label>
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input name="gender" type="radio" value="F"

                                   class="text-orange-500 form-radio focus:ring-2 focus:ring-orange-500" />
                            <span class="ml-2">F</span>
                        </label>
                    </div>
                </div>

                <div class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Marital Status <sup class="text-red-600">*</sup></span>
                    <select name="marital_status" required

                            class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                        <option value="">Select</option>
                        <option value="Single" >Single</option>
                        <option value="Married" }>Married</option>
                        <option value="Divorced" }}>Divorced</option>
                        <option value="Widowed" {>Widowed</option>
                    </select>
                </div>

                <div class="block text-sm flex-1">
                    <span class="text-gray-700 dark:text-gray-400">Highest Education Level</span>
                    <select name="education_level"

                            class="block w-full mt-1 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                        <option value="">Select</option>
                        <option value="High School"  : '' }}>High School</option>
                        <option value="Bachelor" {' }}>Bachelor</option>
                        <option value="Master"  }}>Master</option>
                        <option value="PhD" >PhD</option>
                    </select>
                </div>
            </div>

            <!-- Photo Upload -->
            <label class="block text-sm mt-6">
                <span class="text-gray-700 dark:text-gray-400">Upload Picture</span>
                <input name="picture" type="file"

                       class="block w-full mt-2 px-4 py-3 text-sm rounded-md border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300" />
            </label>

            <!-- Existing photo -->
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center">


            <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-orange-700">
                 creta EMployee
            </button>
        </div>
    </div>
</form>

<!-- Enable fields on edit -->
@if($isEditMode)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editBtn = document.getElementById('editButton');
            if (editBtn) {
                editBtn.addEventListener('click', () => {
                    const form = document.querySelector('#employee-section');
                    form.querySelectorAll('input, select, textarea').forEach(el => {
                        el.removeAttribute('disabled');
                    });
                    editBtn.remove();
                });
            }
        });
    </script>
@endif
