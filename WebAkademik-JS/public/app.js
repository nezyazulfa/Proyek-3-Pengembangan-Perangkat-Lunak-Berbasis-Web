// Scope Global: Database "palsu" kita
let students = [
    { id: 1, name: "Fatimah Hawwa", nim: "241511074", enrolledCourses: [101] },
    { id: 2, name: "Budi Santoso", nim: "241511075", enrolledCourses: [] }
];

let courses = [
    { id: 101, name: "Dasar Pemrograman", sks: 3 },
    { id: 102, name: "Kalkulus I", sks: 3 },
    { id: 103, name: "Struktur Data", sks: 4 }
];

// Fungsi Hapus
function confirmDeleteStudent(studentId) {
    const student = students.find(s => s.id === studentId);
    if (!student) return;
    const isConfirmed = confirm(`Apakah Anda yakin ingin menghapus data:\n\nNama: ${student.name}\nNIM: ${student.nim}`);
    
    if (isConfirmed) {
        students = students.filter(s => s.id !== studentId); 
        document.querySelector('#add-student-form').dispatchEvent(new CustomEvent('studentDeleted'));
    }
}

// Menunggu seluruh halaman HTML siap
document.addEventListener('DOMContentLoaded', () => {

    // --- DOM Selector ---
    const studentTableBody = document.querySelector('#student-table-body');
    const addStudentForm = document.querySelector('#add-student-form');
    const studentSelect = document.querySelector('#student-select');
    const courseChecklist = document.querySelector('#course-checklist');
    const totalSKS = document.querySelector('#total-sks');
    const enrollCourseForm = document.querySelector('#enroll-course-form');
    const navLinks = document.querySelectorAll('.nav-link');
    const views = document.querySelectorAll('.view');

    // --- Render Functions ---
    function renderStudents() {
        studentTableBody.innerHTML = ''; 
        students.forEach(student => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${student.nim}</td>
                <td>${student.name}</td>
                <td>
                    <button class="btn-danger" onclick="confirmDeleteStudent(${student.id})">Hapus</button>
                </td>
            `;
            studentTableBody.appendChild(row);
        });
    }

    function renderEnrollmentForm() {
        studentSelect.innerHTML = students.map(s => `<option value="${s.id}">${s.name}</option>`).join('');
        courseChecklist.innerHTML = courses.map(course => `
            <label>
                <input type="checkbox" class="course-check" value="${course.id}" data-sks="${course.sks}">
                ${course.name} (${course.sks} SKS)
            </label>
        `).join('');
        totalSKS.textContent = '0';
    }

    // --- Event Handling ---
    addStudentForm.addEventListener('submit', (event) => {
        event.preventDefault(); 
        const nameInput = document.querySelector('#student-name');
        const nimInput = document.querySelector('#student-nim');
        
        let isValid = true;
        
        // Validasi Nama
        if (nameInput.value.trim() === '') {
            nameInput.nextElementSibling.style.display = 'block'; 
            nameInput.classList.add('error'); 
            isValid = false;
        } else {
            nameInput.nextElementSibling.style.display = 'none'; 
            nameInput.classList.remove('error'); 
        }
        
        // Validasi NIM
        if (nimInput.value.trim() === '') {
            nimInput.nextElementSibling.style.display = 'block';
            nimInput.classList.add('error');
            isValid = false;
        } else {
            nimInput.nextElementSibling.style.display = 'none';
            nimInput.classList.remove('error');
        }

        if (!isValid) return;

        const newStudent = { id: Date.now(), name: nameInput.value, nim: nimInput.value, enrolledCourses: [] };
        students.push(newStudent);
        renderStudents(); 
        addStudentForm.reset(); 

        // --- INILAH BAGIAN Sync vs Async ---
        const successMessage = document.querySelector('#admin-success-message');
        successMessage.textContent = 'Data mahasiswa berhasil ditambahkan!';
        successMessage.style.display = 'block';
        
        // (1) Perlihatkan contoh setTimeout (async)
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 2000); // Pesan akan hilang setelah 2 detik
    });
    
    addStudentForm.addEventListener('studentDeleted', renderStudents);

    courseChecklist.addEventListener('change', () => {
        let currentSKS = 0;
        const checkedCourses = document.querySelectorAll('.course-check:checked');
        checkedCourses.forEach(checkbox => {
            currentSKS += parseInt(checkbox.dataset.sks); 
        });
        totalSKS.textContent = currentSKS; 
    });

    enrollCourseForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const selectedStudentId = parseInt(studentSelect.value);
        const checkedCourses = document.querySelectorAll('.course-check:checked');
        const student = students.find(s => s.id === selectedStudentId);

        if (!student) return;

        const enrolledCourseIds = Array.from(checkedCourses).map(cb => parseInt(cb.value));
        student.enrolledCourses = enrolledCourseIds;

        alert(`Sukses! ${student.name} telah mendaftar untuk mata kuliah dengan total ${totalSKS.textContent} SKS.`);
        renderEnrollmentForm();
    });

    // Event Listener untuk Navigasi
    navLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            navLinks.forEach(l => l.classList.remove('active'));
            views.forEach(v => v.classList.remove('active-view'));
            
            link.classList.add('active');
            const targetView = document.querySelector(link.getAttribute('href'));
            targetView.classList.add('active-view');
            
            if (link.getAttribute('href') === '#student-view') {
                renderEnrollmentForm();
            }
        });
    });

    // --- Panggilan Fungsi Awal ---
    renderStudents();
    renderEnrollmentForm();
});