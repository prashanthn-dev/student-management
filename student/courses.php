<?php
include_once "../includes/auth_check.php";
check_role("student");

include_once "../config/db.php";
include_once "../includes/functions.php";
include_once "../includes/header.php";

// 📚 Fetch ALL Courses added by Admin
$result = mysqli_query($conn, "
    SELECT id, course_name, course_code, duration
    FROM courses
    ORDER BY id DESC
");
?>

<div class="page-header">

    <h2>📚 Available Courses</h2>

    <p>
        View all courses available in the system
    </p>

</div>

<?php if ($result && mysqli_num_rows($result) > 0): ?>

    <div class="course-grid">

        <?php while ($course = mysqli_fetch_assoc($result)): ?>

            <div class="card course-card">

                <div class="course-top">

                    <div>
                        <h2>
                            <?php echo e($course['course_name']); ?>
                        </h2>

                        <p class="course-subtitle">
                            Course Information
                        </p>
                    </div>

                    <div class="course-badge">
                        ACTIVE
                    </div>

                </div>

                <div class="course-grid">

                    <div class="info-box">

                        <span class="info-title">
                            📘 Course Code
                        </span>

                        <h3>
                            <?php echo e($course['course_code']); ?>
                        </h3>

                    </div>

                    <div class="info-box">

                        <span class="info-title">
                            ⏳ Duration
                        </span>

                        <h3>
                            <?php echo e($course['duration']); ?>
                        </h3>

                    </div>

                </div>

            </div>

        <?php endwhile; ?>

    </div>

<?php else: ?>

    <div class="card empty-state">

        <div style="
            font-size:65px;
            margin-bottom:15px;
        ">
            📚
        </div>

        <h2>No Courses Available</h2>

        <p style="
            margin-top:10px;
            color:#666;
        ">
            No courses have been added by the administrator yet.
        </p>

    </div>

<?php endif; ?>

<?php include_once "../includes/footer.php"; ?>