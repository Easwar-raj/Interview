<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<div class="basicBlockMain">
    <div class="basicBlockHeader">
        <div class="row">
            <div class="col-md-6"><img src="{{ asset('images/thikse-logo.png') }}" alt="Logo" class="basicBlockHeaderLogo"></div>
            <div class="col-md-6"><h4 class="basicBlockHeaderTitle">Thikse Software Solutions Campus Interview Portal</h4></div>
        </div>
</div>
<div class="container students-scores">
    @if(isset($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @else
        <div class="scores-header">
            <h2>Analyzing the Range of Student Performance</h2>
            <h6 class="fw-bold">Total test completed Students: {{ $total_students }}</h6>
            <div id="visible-row-count"></div>
        </div>

        <div class="filter-section">
            <input type="number" id="min-percentage" placeholder="Min %" min="0" max="100">
            <input type="number" id="max-percentage" placeholder="Max %" min="0" max="100">
            <button class="filter-btn" onclick="filterTable()"><i class="bi bi-filter"></i>
            Filter</button>
            <button onclick="downloadExcel()" class="filter-btn bg-success downloadBtn" id="downloadBtn"><i class="bi bi-download"></i> Download Excel</button>
        </div>

        <div class="scores-table">
            <table class="table" id="scoresTable">
                <thead>
                    <tr>
                        <th onclick="sortTable(0)">S.No</th>
                        <th onclick="sortTable(1)">Student Name</th>
                        <th >Student Rollnumber</th>
                        <th onclick="sortTable(3)">Correct Answers</th>
                        <th >MCQ-percentage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $var= 1  @endphp

                    @foreach($students as $student)
                        <tr>
                            <td> {{$var}} </td>
                            <td>{{ $student['student_name'] }}</td>
                            <td>{{$student['roll_number']}}</td>
                            <td>{{ $student['mcq_score'] }}</td>
                            <td class="mcq-percentage">{{ $student['mcq_percentage'] }}%</td>
                            <td>
                                @php $url = route('view.answers', $student['test_id']) @endphp
                                <button class="view-btn" onclick="window.location.href='{{ $url }}'">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        @php $var++ @endphp
                    @endforeach

                </tbody>

            </table>
            <div class="d-flex justify-content-center align-items-center vh-50">
                <div class="text-center" style="display: none;" id="no-data">
                    <img src="{{ asset('images/nodata.svg') }}" class="basicBlockHeaderLogo">
                    <p class="mb-3">No Data Found for the Filter!</p>
                </div>
            </div>
            <div class="pagination">
                <button class="pagination-btn" onclick="changePage('prev')">Previous</button>
                <span id="page-info"></span>
                <button class="pagination-btn" onclick="changePage('next')">Next</button>
            </div>
        </div>
    @endif
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
    function filterTable() {
        let minPercentage = parseFloat(document.getElementById('min-percentage').value) || 0;
        let maxPercentage = parseFloat(document.getElementById('max-percentage').value) || 100;

        let rows = document.querySelectorAll('#scoresTable tbody tr');
        let visibleRows = 0;

        rows.forEach(row => {
            let percentageText = row.querySelector('.mcq-percentage').innerText;
            let percentage = parseFloat(percentageText.replace('%', ''));

            if (percentage >= minPercentage && percentage <= maxPercentage) {
                row.style.display = '';
                visibleRows++;

            } else {
                row.style.display = 'none';


            }
        });

        // if (visibleRows > 0)
        // {
        //     let count = document.getElementById('visible-row-count').innerText = `Total Student count on fillter: ${visibleRows}`;
        // }
        // else
        // {
        //     let count = document.getElementById('visible-row-count').innerText = ``;
        // }


       let noDataDiv = document.getElementById('no-data');
        let DonwloadButton = document.getElementById('downloadBtn');
            if (visibleRows === 0) {
                noDataDiv.style.display = 'block';
                DonwloadButton.style.display = 'none';

            } else {
                noDataDiv.style.display = 'none';
                DonwloadButton.style.display = 'block';
        }



    }



    function downloadExcel() {
    console.log("click ....");
    let rows = document.querySelectorAll('#scoresTable tbody tr');
    let data = [];

    // Add headers (excluding the "action" header)
    let headers = [];
    let actionIndex = -1; // To store the index of the "action" column
    document.querySelectorAll('#scoresTable thead th').forEach((header, index) => {
        if (header.innerText.toLowerCase() !== 'actions') {
            headers.push(header.innerText);
        } else {
            actionIndex = index; // Store the index of the "action" column
        }
    });
    data.push(headers);

    // Add filtered rows (excluding the "action" column data)
    rows.forEach(row => {
        if (row.style.display !== 'none') {
            let rowData = [];
            row.querySelectorAll('td').forEach((cell, index) => {
                if (index !== actionIndex) { // Skip the "action" column
                    rowData.push(cell.innerText);
                }
            });
            data.push(rowData);
        }
    });

    // Convert to Excel
    let ws = XLSX.utils.aoa_to_sheet(data);
    let wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, "filtered_data.xlsx");
}


let currentPage = 1; // Current page
const rowsPerPage = 10; // Rows per page

// Function to render the current page
function renderPage() {
    const table = document.getElementById('scoresTable');
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    rows.forEach((row, index) => {
        row.style.display = index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage ? '' : 'none';
    });

    // Update pagination info
    const pageInfo = document.getElementById('page-info');
    pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

    // Enable/disable navigation buttons
    document.querySelector(".pagination button:nth-child(1)").disabled = currentPage === 1;
    document.querySelector(".pagination button:nth-child(3)").disabled = currentPage === totalPages;
}

// Change page handler
function changePage(direction) {
    const table = document.getElementById('scoresTable');
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    if (direction === 'next' && currentPage < totalPages) {
        currentPage++;
    } else if (direction === 'prev' && currentPage > 1) {
        currentPage--;
    }

    renderPage();
}

// Initial render
document.addEventListener('DOMContentLoaded', () => {
    renderPage();
});

</script>


<style>
.students-scores {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}


.basicBlockHeaderLogo {
            width: 200px;
            height: auto;
        }

.scores-header {
    margin-bottom: 2rem;
    text-align: left;
}

.scores-header h2 {
    color: #333;
    margin-bottom: 1rem;
}

.scores-table {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 2rem;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}

.table th,
.table td {
    padding: 1rem;
    text-align: center;
    border: 1px solid #e2e8f0;
}

.table th {
    background-color: #3251ba;
    color: white;
    font-weight: 600;
    cursor: pointer;
}

.table tr:nth-child(even) {
    background-color: #f8f9fa;
}

.table tr:hover {
    background-color: #f0f0f0;
}

.view-btn {
    background-color: #8196de;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    border: none;
    transition: background-color 0.3s;
}

.view-btn:hover {
    background-color: #6272a6;
    text-decoration: none;
    color: white;
}

.back-button-container {
    text-align: center;
    margin-top: 2rem;
}

.back-btn {
    background-color: #6c757d;
    color: white;
    padding: 10px 20px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.filter-btn:hover {
    background-color: #0056b3;
}

.filter-section {
    display: flex;
    justify-content: end;
    gap: 1rem;
    margin-bottom: 1rem;
}

.filter-section input {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 120px;
}

.filter-btn {
    background-color: #8196de;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
}
.sort-icon
{
    margin-left: 5px;
}
.pagination {
    text-align: center;
    margin-top: 1rem;
}

.pagination-btn {
    background-color: #8196de;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 0 5px;
}

.pagination-btn:disabled {
    background-color: #c4c4c4;
    cursor: not-allowed;
}

.pagination-btn:hover:enabled {
    background-color: #6272a6;
}

</style>


<!-- <script>
function sortTable(columnIndex) {
    const table = document.getElementById("scoresTable");
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));

    // Determine the current sort order
    const isAscending = table.querySelector(`th:nth-child(${columnIndex + 1})`).classList.toggle("asc");

    // Sort the rows based on the column content
    rows.sort((rowA, rowB) => {
        const cellA = rowA.querySelector(`td:nth-child(${columnIndex + 1})`).textContent.trim();
        const cellB = rowB.querySelector(`td:nth-child(${columnIndex + 1})`).textContent.trim();

        if (!isNaN(cellA) && !isNaN(cellB)) {
            return isAscending ? cellA - cellB : cellB - cellA; // Numeric comparison
        } else {
            return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA); // String comparison
        }
    });

    // Re-append the sorted rows to the tbody
    rows.forEach(row => tbody.appendChild(row));
}
</script> -->


<script>
function sortTable(columnIndex) {
    const table = document.getElementById("scoresTable");
    const tbody = table.querySelector("tbody");
    const rows = Array.from(tbody.querySelectorAll("tr"));
    const header = table.querySelector(`th:nth-child(${columnIndex + 1})`);

    // Check if the column is already sorted
    const isAlreadySorted = header.classList.contains("active-sort");
    const isAscending = header.classList.contains("asc");

    // Remove sorting icons and active classes from all headers
    table.querySelectorAll("th").forEach(th => {
        th.classList.remove("asc", "desc", "active-sort");
        th.querySelector(".sort-icon")?.remove(); // Remove existing icons
    });

    // Toggle sorting order if the same column is clicked again
    let newSortOrder;
    if (isAlreadySorted) {
        newSortOrder = isAscending ? false : true; // Toggle between ascending and descending
    } else {
        newSortOrder = false; // Default to descending for a new column
    }

    // Add the active class and appropriate sorting order class to the current header
    header.classList.add("active-sort", newSortOrder ? "asc" : "desc");

    // Create a new icon element
    const icon = document.createElement("span");
    icon.className = "sort-icon";
    icon.innerHTML = newSortOrder ? "&#9650;" : "&#9660;"; // Unicode for up and down arrows

    // Add the icon to the current header
    header.appendChild(icon);

    // Sort the rows based on the column content
    rows.sort((rowA, rowB) => {
        const cellA = rowA.querySelector(`td:nth-child(${columnIndex + 1})`).textContent.trim();
        const cellB = rowB.querySelector(`td:nth-child(${columnIndex + 1})`).textContent.trim();

        if (!isNaN(cellA) && !isNaN(cellB)) {
            return newSortOrder ? cellA - cellB : cellB - cellA; // Numeric comparison
        } else {
            return newSortOrder ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA); // String comparison
        }
    });

    // Re-append the sorted rows to the tbody
    tbody.innerHTML = ""; // Clear the tbody first
    rows.forEach(row => tbody.appendChild(row));
}
</script>




