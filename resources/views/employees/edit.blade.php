@extends('layouts.app')

@section('title', 'Kit Service | Edit Employee')

@section('content')
    <div class="container px-4 md:px-6 mx-auto grid">

        <!-- Tabs -->
        <div class="mb-6">
            <div class="flex border-b dark:border-gray-700 space-x-4">
                <button type="button" class="tab-btn active-tab" data-target="employee-section">Employee</button>
                <button type="button" class="tab-btn" data-target="address-section">Address</button>
                <button type="button" class="tab-btn" data-target="emergency-section">Emergency</button>
                <button type="button" class="tab-btn" data-target="family-section">Family</button>
                <button type="button" class="tab-btn" data-target="entreprise-section">Entreprise</button>
                <button type="button" class="tab-btn" data-target="picture-section">Picture</button>
            </div>
        </div>

        <form id="employeeForm" action="{{ route('employees.update', $employee->employee_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            {{-- EMPLOYEE INFO --}}
            <div id="employee-section" class="tab-content active p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">
                    Edit Employee Information for {{ $employee->first_name .' '. $employee->last_name }}
                </h3>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                               value="{{ old('first_name', $employee->first_name) }}"
                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-orange-400" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                               value="{{ old('last_name', $employee->last_name) }}"
                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-orange-400" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name"
                               value="{{ old('middle_name', $employee->middle_name) }}"
                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-orange-400" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Personal ID</label>
                        <input type="text" name="personal_id" id="personal_id"
                               value="{{ old('personal_id', $employee->personal_id) }}"
                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-orange-400" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Birth Date</label>
                        <input type="date" name="birth_date" id="birth_date"
                               value="{{ old('birth_date', optional($employee->birth_date)->format('Y-m-d') ?? $employee->birth_date) }}"
                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-orange-400" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Nationality</label>
                        <input type="text" name="nationality" id="nationality"
                               value="{{ old('nationality', $employee->nationality) }}"
                               class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-orange-400" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4 items-end">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Gender</label>
                        <div class="flex items-center space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="M"
                                       {{ old('gender', $employee->gender) == 'M' ? 'checked' : '' }}
                                       class="form-radio" />
                                <span class="ml-2">M</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="F"
                                       {{ old('gender', $employee->gender) == 'F' ? 'checked' : '' }}
                                       class="form-radio" />
                                <span class="ml-2">F</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Marital Status</label>
                        <select name="marital_status" id="marital_status" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['Single','Married','Divorced','Widowed'] as $ms)
                                <option value="{{ $ms }}" {{ old('marital_status', $employee->marital_status) == $ms ? 'selected' : '' }}>
                                    {{ $ms }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Education Level</label>
                        <select name="highest_education_level" id="highest_education_level" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['High School','Bachelor','Master','PhD'] as $ed)
                                <option value="{{ $ed }}" {{ old('highest_education_level', $employee->highest_education_level) == $ed ? 'selected' : '' }}>
                                    {{ $ed }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- ADDRESS INFO --}}
            <div id="address-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Address Information</h3>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">House Phone</label>
                        <input type="text" name="house_phone" id="house_phone"
                               value="{{ old('house_phone', $employee->house_phone) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Mobile Phone</label>
                        <input type="text" name="mobile_phone" id="mobile_phone"
                               value="{{ old('mobile_phone', $employee->mobile_phone) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email"
                               value="{{ old('email', $employee->email) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Address Line 1</label>
                        <input type="text" name="address1" id="address1"
                               value="{{ old('address1', $employee->address1) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Address Line 2</label>
                        <input type="text" name="address2" id="address2"
                               value="{{ old('address2', $employee->address2) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">City</label>
                        <input type="text" name="city" id="city"
                               value="{{ old('city', $employee->city) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                </div>
            </div>

            {{-- EMERGENCY INFO --}}
            <div id="emergency-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Emergency Contact</h3>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Relationship</label>
                        <select name="emergency_relationship" id="emergency_relationship" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['Mr','Mss','Dr','Father','Mother','Uncle','Tante','Husband','Wife'] as $r)
                                <option value="{{ $r }}" {{ old('emergency_relationship', $employee->emergency_relationship) == $r ? 'selected' : '' }}>
                                    {{ $r }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="emergency_full_name" id="emergency_full_name"
                               value="{{ old('emergency_full_name', $employee->emergency_full_name) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Mobile Phone</label>
                        <input type="text" name="emergency_mobile_phone" id="emergency_mobile_phone"
                               value="{{ old('emergency_mobile_phone', $employee->emergency_mobile_phone) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">City</label>
                        <input type="text" name="emergency_city" id="emergency_city"
                               value="{{ old('emergency_city', $employee->emergency_city) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700 mb-1">Address</label>
                    <input type="text" name="emergency_address" id="emergency_address"
                           value="{{ old('emergency_address', $employee->emergency_address) }}"
                           class="w-full px-3 py-2 border rounded-md" />
                </div>
            </div>

            {{-- FAMILY INFO --}}
            <div id="family-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Family Information</h3>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Father's Name</label>
                        <input type="text" name="father_name" id="father_name"
                               value="{{ old('father_name', $employee->father_name) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Father's Status</label>
                        <select name="father_name_status" id="father_name_status" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['Alive'=>'Alive','Deceased'=>'Deceased'] as $k => $v)
                                <option value="{{ $k }}" {{ old('father_name_status', $employee->father_name_status) == $k ? 'selected' : '' }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Mother's Name</label>
                        <input type="text" name="mother_name" id="mother_name"
                               value="{{ old('mother_name', $employee->mother_name) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Mother's Status</label>
                        <select name="mother_name_status" id="mother_name_status" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['Alive'=>'Alive','Deceased'=>'Deceased'] as $k => $v)
                                <option value="{{ $k }}" {{ old('mother_name_status', $employee->mother_name_status) == $k ? 'selected' : '' }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Spouse Name</label>
                        <input type="text" name="spouse_name" id="spouse_name"
                               value="{{ old('spouse_name', $employee->spouse_name) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Spouse Phone</label>
                        <input type="text" name="spouse_phone" id="spouse_phone"
                               value="{{ old('spouse_phone', $employee->spouse_phone) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Spouse Birth Date</label>
                        <input type="date" name="spouse_birth_date" id="spouse_birth_date"
                               value="{{ old('spouse_birth_date', optional($employee->spouse_birth_date)->format('Y-m-d') ?? $employee->spouse_birth_date) }}"
                               class="w-full px-3 py-2 border rounded-md" />
                    </div>
                </div>
            </div>

            {{-- ENTREPRISE INFO --}}
            <div id="entreprise-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Entreprise Information</h3>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Department</label>
                        <select name="department" id="department" class="w-full px-3 py-2 border rounded-md">
                            @foreach($departments as $dept)
                                <option value="{{ $dept }}" {{ old('department', $employee->department) == $dept ? 'selected' : '' }}>
                                    {{ $dept }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Function</label>
                        <select name="function" id="function" class="w-full px-3 py-2 border rounded-md">
                            @foreach($fonctions as $fun)
                                <option value="{{ $fun }}" {{ old('function', $employee->function) == $fun ? 'selected' : '' }}>
                                    {{ $fun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Niveau</label>
                        <select name="niveau" id="niveau" class="w-full px-3 py-2 border rounded-md">
                            @foreach($niveaux as $niv)
                                <option value="{{ $niv }}" {{ old('niveau', $employee->niveau) == $niv ? 'selected' : '' }}>
                                    {{ $niv }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Echelon</label>
                        <select name="echelon" id="echelon" class="w-full px-3 py-2 border rounded-md">
                            @foreach($echelons as $ech)
                                <option value="{{ $ech }}" {{ old('echelon', $employee->echelon) == $ech ? 'selected' : '' }}>
                                    {{ $ech }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Situation avant embauche</label>
                        <select name="situation_avant_embauche" id="situation_avant_embauche" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['Stagiaire'=>'Stagiaire','Chômeur'=>'Chômeur','Étudiant'=>'Étudiant','Étudiante'=>'Étudiante','Travailleur'=>'Travailleur'] as $k => $v)
                                <option value="{{ $k }}" {{ old('situation_avant_embauche', $employee->situation_avant_embauche) == $k ? 'selected' : '' }}>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Taux horaire brut (FC)</label>
                        <input type="number" name="taux_horaire_brut" id="taux_horaire_brut" readonly
                               value="{{ old('taux_horaire_brut', $employee->taux_horaire_brut) }}"
                               class="w-full px-3 py-2 border rounded-md bg-gray-50" />
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-4">
                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Contract Type</label>
                        <select name="contract_type" id="contract_type" class="w-full px-3 py-2 border rounded-md">
                            @foreach(['CDI'=>'CDI','CDD'=>'CDD','Stage'=>'Stage'] as $k=>$v)
                                <option value="{{ $k }}" {{ old('contract_type', $employee->contract_type) == $k ? 'selected' : '' }}>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label class="block text-gray-700 mb-1">Salaire mensuel brut</label>
                        <input type="number" name="salaire_mensuel_brut" id="salaire_mensuel_brut" readonly
                               value="{{ old('salaire_mensuel_brut', $employee->salaire_mensuel_brut) }}"
                               class="w-full px-3 py-2 border rounded-md bg-gray-50" />
                    </div>
                </div>
            </div>

            {{-- PICTURE INFO --}}
            <div id="picture-section" class="tab-content p-6 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Upload Picture</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Upload Picture</label>
                    <div class="upload-btn-wrapper bg-orange-500 text-white px-4 py-2 rounded inline-block cursor-pointer">
                        <span>Choose File</span>
                        <input type="file" id="upload" name="photo" accept="image/*" />
                    </div>
                    <span id="file-name" class="ml-2 text-gray-600">{{ $employee->photo }}</span>

                    @if($employee->photo)
                        <div class="mt-3">
                            <img src="{{ asset('storage/' . $employee->photo) }}" alt="photo" class="w-28 h-28 object-cover rounded">
                        </div>
                    @endif
                </div>
            </div>

            {{-- SUBMIT --}}
            <div class="flex justify-end mb-10">
                <button type="submit" class="orange-btn">Update Employee</button>
            </div>

        </form>
    </div>

    {{-- Styles et scripts pour Tabs --}}
    <style>
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .tab-btn.active-tab { border-bottom: 2px solid #f97316; color: #f97316; font-weight: bold; }
        .tab-btn { padding: 0.5rem 1rem; cursor: pointer; transition: 0.2s; border-bottom: 2px solid transparent; }
        .orange-btn { background-color: #f97316; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.5rem; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            // Montrer la première tab au départ
            tabContents.forEach(tc => tc.classList.remove('active'));
            if(tabContents.length>0) tabContents[0].classList.add('active');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    tabContents.forEach(tc => tc.classList.remove('active'));
                    tabButtons.forEach(b => b.classList.remove('active-tab'));

                    document.getElementById(btn.dataset.target).classList.add('active');
                    btn.classList.add('active-tab');
                });
            });

            // preview filename
            const upload = document.getElementById('upload');
            const fileName = document.getElementById('file-name');
            if(upload){
                upload.addEventListener('change', (e) => {
                    const f = e.target.files[0];
                    if(f) fileName.textContent = f.name;
                });
            }
        });
    </script>
@endsection
