
async function loadFacultyData() {
    try {
      const response = await fetch('faculty.json');
      const data = await response.json();
      
      // Group teachers by subject
      const groupedData = groupBySubject(data);
      
      const galleryContainer = document.getElementById('faculty-gallery');
  
      // Iterate over the grouped data
      for (let subject in groupedData) {
        const facultyGroup = document.createElement('div');
        facultyGroup.classList.add('faculty-group');
  
        // Add subject heading
        const subjectHeading = document.createElement('h3');
        subjectHeading.textContent = subject;
        facultyGroup.appendChild(subjectHeading);
  
        // Add teachers for the current subject
        groupedData[subject].forEach(teacher => {
          const teacherDiv = document.createElement('div');
          teacherDiv.classList.add('teacher');
  
          const img = document.createElement('img');
          img.src = teacher.photo_url;
          img.alt = teacher.NAME;
          img.classList.add('teacher-photo');
  
          const infoDiv = document.createElement('div');
          infoDiv.classList.add('info');
  
          const name = document.createElement('h3');
          name.classList.add('name');
          name.textContent = teacher.NAME;
  
          const faculty = document.createElement('p');
          faculty.classList.add('faculty');
          faculty.textContent = teacher.Subject;
  
          infoDiv.appendChild(name);
          infoDiv.appendChild(faculty);
  
          teacherDiv.appendChild(img);
          teacherDiv.appendChild(infoDiv);
  
          facultyGroup.appendChild(teacherDiv);
        });
  
        galleryContainer.appendChild(facultyGroup);
      }
    } catch (error) {
      console.error('Error loading the JSON file:', error);
    }
  }
  
  // Helper function to group teachers by subject
  function groupBySubject(data) {
    return data.reduce((grouped, teacher) => {
      const { Subject } = teacher;
      if (!grouped[Subject]) {
        grouped[Subject] = [];
      }
      grouped[Subject].push(teacher);
      return grouped;
    }, {});
  }
  
  // Call the function to load data when the page is ready
  loadFacultyData();
  
  // newFunction(); /* Apply blur effect */

function newFunction() {
  backdrop - filter; blur(10, px);
}

