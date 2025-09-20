@extends('layouts.app')

@section('title', 'Kit Service | Add or Edit Employee')

<!-- Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<!-- Croppie CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
<!-- Croppie JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<style>
    .orange-btn {
        background-color: #f97316; /* orange-500 */
        color: white;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .orange-btn:hover {
        background-color: #ea580c; /* orange-600 */
    }
    .tab-btn {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-bottom: 2px solid transparent;
        color: #4B5563;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .tab-btn:hover { color: #f97316; }
    .tab-btn.active-tab {
        border-bottom-color: #f97316;
        color: #f97316;
    }
    .tab-content { display: none; }
    .tab-content.active { display: block; }
    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        cursor: pointer;
    }
    .upload-btn-wrapper input[type=file] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
</style>

@section('content')
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container px-4 md:px-6 mx-auto grid">

        <!-- Tabs -->
        <div class="mb-6">
            <div class="flex border-b dark:border-gray-700 space-x-4">
                <button type="button" class="tab-btn active-tab" data-target="employee-section"><i class="fas fa-user mr-2"></i> Employee</button>
                <button type="button" class="tab-btn" data-target="address-section"><i class="fas fa-map-marker-alt mr-2"></i> Address</button>
                <button type="button" class="tab-btn" data-target="emergency-section"><i class="fas fa-phone-alt mr-2"></i> Emergency</button>
                <button type="button" class="tab-btn" data-target="family-section"><i class="fas fa-users mr-2"></i> Family</button>
                <button type="button" class="tab-btn" data-target="entreprise-section"><i class="fas fa-building mr-2"></i> Entreprise</button>
                <button type="button" class="tab-btn" data-target="picture-section"><i class="fas fa-image mr-2"></i> Picture</button>
            </div>
        </div>

        <form id="employeeForm" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf

            {{-- EMPLOYEE INFO --}}
            <div id="employee-section" class="tab-content active p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Employee Information</h3>
                <div class="flex flex-col md:flex-row gap-6">
                    <x-form.input name="first_name" label="First Name"  autocomplete="off"/>
                    <x-form.input name="last_name" label="Last Name"  autocomplete="off"/>
                    <x-form.input name="middle_name" label="Middle Name" autocomplete="off"/>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <x-form.input name="personal_id" label="Personal ID" autocomplete="off" />
                    <x-form.input type="date" name="birth_date" label="Birth Date" autocomplete="off"/>
                    <x-form.input name="nationality" label="Nationality" autocomplete="off"/>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="block text-sm flex-1">
                        <span class="text-gray-700">Gender <sup class="text-red-600">*</sup></span>
                        <div class="flex space-x-6 mt-2">
                            <x-form.radio name="gender" value="M" label="M" />
                            <x-form.radio name="gender" value="F" label="F" />
                        </div>
                    </div>
                    <x-form.select name="marital_status" label="Marital Status" :options="['Single', 'Married', 'Divorced', 'Widowed']"  />
                    <x-form.select name="highest_education_level" label="Education Level" :options="['High School', 'Bachelor', 'Master', 'PhD']" />
                </div>
            </div>

            {{-- ADDRESS INFO --}}
            <div id="address-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Address Information</h3>
                <div class="flex flex-col md:flex-row gap-6">
                    <x-form.input name="house_phone" label="House Phone" autocomplete="off" />
                    <x-form.input name="mobile_phone" label="Mobile Phone"  autocomplete="off" />
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <x-form.input name="email" type="email" label="Email"  autocomplete="off"/>
                    <x-form.input name="address1" label="Address Line 1"  autocomplete="off"/>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <x-form.input name="address2" label="Address Line 2" autocomplete="off" />
                    <x-form.input name="city" label="City" autocomplete="off"/>
                </div>
            </div>

            {{-- EMERGENCY INFO --}}
            <div id="emergency-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Emergency Contact</h3>
                <div class="flex flex-col md:flex-row gap-6">
                    <x-form.select name="emergency_relationship" label="Relationship" :options="['Mr','Mss','Dr','Father','Mother','Uncle','Tante','Husband','Wife']" />
                    <x-form.input name="emergency_full_name" label="Full Name"  autocomplete="off" />
                </div>
                <div class="flex flex-col md:flex-row gap-6">
                    <x-form.input name="emergency_mobile_phone" label="Mobile Phone"  autocomplete="off"/>
                    <x-form.input name="emergency_city" label="City"  autocomplete="off"/>
                </div>
                <div class="mt-4">
                    <x-form.input name="emergency_address" label="Address"  autocomplete="off"/>
                </div>
            </div>

            {{-- FAMILY INFO --}}
            <div id="family-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Family Information</h3>
                <div class="flex flex-col md:flex-row gap-6">
                    <x-form.input name="father_name" label="Father's Name" autocomplete="off"/>
                    <x-form.select name="father_name_status" label="Father's Status" :options="['Alive'=>'Alive','Deceased'=>'Deceased']"/>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <x-form.input name="mother_name" label="Mother's Name"/>
                    <x-form.select name="mother_name_status" label="Mother's Status" :options="['Alive'=>'Alive','Deceased'=>'Deceased']"/>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <x-form.input name="spouse_name" label="Spouse Name" autocomplete="off"/>
                </div>
                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <x-form.input type="text" name="spouse_phone" label="Spouse Phone" autocomplete="off"/>
                    <x-form.input type="date" name="spouse_birth_date" label="Birth Date" />
                </div>
            </div>

                {{-- ENTREPRISE INFO --}}
                <div id="entreprise-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Entreprise Information</h3>

                    <div class="flex flex-col md:flex-row gap-6">
                        <x-form.select id="department" name="department" label="Department" :options="$departments" />
                        <x-form.select id="function" name="function" label="Function" :options="$fonctions" />
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 mt-4">
                        <x-form.select id="niveau" name="niveau" label="Niveau" :options="$niveaux" />
                        <x-form.select id="echelon" name="echelon" label="Echelon" :options="$echelons" />
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 mt-4">
                        <x-form.select
                            name="situation_avant_embauche"
                            label="Situation avant embauche"
                            :options="[
                            'Stagiaire'   => 'Stagiaire',
                            'Chômeur'     => 'Chômeur',
                            'Étudiant'    => 'Étudiant',
                            'Étudiante'   => 'Étudiante',
                            'Travailleur' => 'Travailleur'
                            ]"
                        />

                        <x-form.input id="taux_horaire_brut" name="taux_horaire_brut" label="Taux horaire brut (FC)" type="number" readonly />
{{--                        <x-form.input id="base_salary" name="base_salary" label="Salaire mensuel brut" type="number" readonly />--}}
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 mt-4">
                        <x-form.select name="contract_type" label="Contract Type" :options="['CDI'=>'CDI','CDD'=>'CDD','Stage'=>'Stage']" />
                        <x-form.input id="salaire_mensuel_brut" name="salaire_mensuel_brut" label="Salaire mensuel brut" type="number" readonly />
                    </div>
                </div>

            {{-- PICTURE INFO --}}
            <div id="picture-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Upload Picture</h3>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Upload Picture</label>
                    <div class="upload-btn-wrapper bg-orange-500 text-white px-4 py-2 rounded inline-block cursor-pointer">
                        <span>Choose File</span>
                        <input type="file" id="upload" accept="image/*" />
                    </div>
                    <span id="file-name" class="ml-2 text-gray-600"></span>
                </div>

                <input type="hidden" name="photo_cropped" id="photo_cropped"/>
                <div id="upload-demo" class="mt-4 mb-4"></div>
                <button type="button" id="crop-btn" class="orange-btn hidden">Crop Image</button>
            </div>

            {{-- SUBMIT BUTTON --}}
            <div class="flex justify-end mb-10">
                <button type="submit" id="submitBtn" class="orange-btn">Create Employee</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- Tabs ---
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    tabContents.forEach(tc => tc.classList.remove('active'));
                    tabButtons.forEach(b => b.classList.remove('active-tab'));
                    document.getElementById(btn.dataset.target).classList.add('active');
                    btn.classList.add('active-tab');
                });
            });

            // --- Croppie ---
            const croppieInstance = new Croppie(document.getElementById('upload-demo'), {
                viewport: { width: 200, height: 200, type: 'square' },
                boundary: { width: 300, height: 300 },
                enableResize: true,
                enableOrientation: true
            });

            const uploadInput = document.getElementById('upload');
            const cropBtn = document.getElementById('crop-btn');
            const fileName = document.getElementById('file-name');

            uploadInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    fileName.textContent = this.files[0].name;
                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        croppieInstance.bind({ url: ev.target.result });
                        cropBtn.classList.remove('hidden');
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            cropBtn.addEventListener('click', function() {
                croppieInstance.result({
                    type: 'base64',
                    size: 'viewport',
                    format: 'jpeg'
                }).then(function(base64) {
                    // Set the base64 data to the hidden input
                    document.getElementById('photo_cropped').value = base64;
                    alert('Image cropped successfully! Click "Create Employee" to save.');
                });
            });

            // --- Form validation ---
            const form = document.getElementById('employeeForm');
            const submitBtn = document.getElementById('submitBtn');

            const checkRequiredFields = () => {
                const requiredFields = form.querySelectorAll('[required]');
                let allFilled = true;

                requiredFields.forEach(f => {
                    if (!f.value.trim()) {
                        allFilled = false;
                    }
                });

                // Show/hide submit button based on required fields
                if (allFilled) {
                    submitBtn.classList.remove('hidden');
                } else {
                    submitBtn.classList.add('hidden');
                }
            };

            // Monitor all required fields
            form.querySelectorAll('[required]').forEach(f => f.addEventListener('input', checkRequiredFields));
            checkRequiredFields();

            // --- Salary Grid Logic ---
            const salaryGrids = @json($salaryGrids);
            const departmentSelect = document.getElementById('department_id');
            const fonctionSelect = document.getElementById('fonction_id');
            const niveauSelect = document.getElementById('niveau_id');
            const echelonSelect = document.getElementById('echelon_id');
            const baseSalaryInput = document.getElementById('base_salary');

            function updateDropdowns() {
                const deptId = departmentSelect.value;

                // Filter based on department
                const filteredGrids = salaryGrids.filter(sg => sg.department_id == deptId);

                // Fill Function dropdown
                fonctionSelect.innerHTML = '';
                const fonctions = [...new Map(filteredGrids.map(sg => [sg.function_id, sg.fonction.name]))];
                fonctions.forEach(([id, name]) => {
                    const opt = document.createElement('option');
                    opt.value = id;
                    opt.text = name;
                    fonctionSelect.appendChild(opt);
                });

                // Fill Niveau dropdown
                niveauSelect.innerHTML = '';
                const niveaux = [...new Map(filteredGrids.map(sg => [sg.niveau_id, sg.niveau.name]))];
                niveaux.forEach(([id, name]) => {
                    const opt = document.createElement('option');
                    opt.value = id;
                    opt.text = name;
                    niveauSelect.appendChild(opt);
                });

                // Fill Echelon dropdown
                echelonSelect.innerHTML = '';
                const echelons = [...new Map(filteredGrids.map(sg => [sg.echelon_id, sg.echelon.name]))];
                echelons.forEach(([id, name]) => {
                    const opt = document.createElement('option');
                    opt.value = id;
                    opt.text = name;
                    echelonSelect.appendChild(opt);
                });

                updateSalary();
            }

            function updateSalary() {
                const deptId = departmentSelect.value;
                const fonctionId = fonctionSelect.value;
                const niveauId = niveauSelect.value;
                const echelonId = echelonSelect.value;

                const grid = salaryGrids.find(sg =>
                    sg.department_id == deptId &&
                    sg.function_id == fonctionId &&
                    sg.niveau_id == niveauId &&
                    sg.echelon_id == echelonId
                );

                baseSalaryInput.value = grid ? grid.base_salary : '';
            }

            // Listeners for salary grid
            departmentSelect.addEventListener('change', updateDropdowns);
            fonctionSelect.addEventListener('change', updateSalary);
            niveauSelect.addEventListener('change', updateSalary);
            echelonSelect.addEventListener('change', updateSalary);

            // Initialize on load
            window.addEventListener('DOMContentLoaded', () => {
                updateDropdowns();
                updateSalary();
            });
        });
    </script>
@endsection
