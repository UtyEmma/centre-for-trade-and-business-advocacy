<?php

namespace Database\Seeders;

use App\Enums\JobPostingStatus;
use App\Models\JobPosting;
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    public function run(): void
    {
        if (JobPosting::query()->exists()) {
            return;
        }

        $jobPostings = [
            [
                'title' => 'Program Manager',
                'department' => 'Programs',
                'location' => 'Lagos, Nigeria',
                'employment_type' => 'full_time',
                'workplace_type' => 'hybrid',
                'summary' => 'Lead program delivery, partner coordination, and field implementation for strategic community initiatives.',
                'description' => 'The Program Manager oversees planning, coordination, delivery, and reporting across priority programs. This role works closely with internal teams, partners, and community stakeholders to keep implementation focused, measurable, and aligned with organizational goals.',
                'responsibilities' => 'Coordinate program work plans, budgets, timelines, and reporting cycles. Support partner engagement, field activities, stakeholder meetings, and program reviews. Track risks, document progress, and ensure delivery teams have the information needed to execute well.',
                'requirements' => 'At least five years of experience managing social impact, development, education, or community programs. Strong project management, communication, facilitation, and reporting skills are required.',
                'benefits' => 'Collaborative team environment, professional development support, health coverage, and flexible hybrid work arrangements.',
                'salary_range' => 'Competitive',
                'application_url' => null,
                'application_email' => 'careers@example.com',
                'application_deadline' => now()->addWeeks(6),
                'status' => JobPostingStatus::Open->value,
                'sort_order' => 1,
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Research Analyst',
                'department' => 'Research',
                'location' => 'Abuja, Nigeria',
                'employment_type' => 'full_time',
                'workplace_type' => 'onsite',
                'summary' => 'Support research design, data analysis, evidence briefs, and insight generation for policy and program teams.',
                'description' => 'The Research Analyst contributes to quantitative and qualitative research projects, helping transform field data, desk research, and stakeholder input into practical recommendations.',
                'responsibilities' => 'Conduct literature reviews, clean and analyze datasets, prepare charts and briefs, support interviews and focus groups, and contribute to reports for internal and external audiences.',
                'requirements' => 'A degree in economics, statistics, public policy, social sciences, or a related field. Experience with research methods, spreadsheet analysis, and clear technical writing is expected.',
                'benefits' => 'Research mentorship, learning budget, health coverage, and opportunities to contribute to public-facing reports.',
                'salary_range' => 'NGN 600,000 - NGN 900,000 monthly',
                'application_url' => null,
                'application_email' => 'careers@example.com',
                'application_deadline' => now()->addWeeks(5),
                'status' => JobPostingStatus::Open->value,
                'sort_order' => 2,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Partnerships Coordinator',
                'department' => 'Partnerships',
                'location' => 'Remote',
                'employment_type' => 'contract',
                'workplace_type' => 'remote',
                'summary' => 'Coordinate partner communications, relationship records, meetings, and follow-up across active initiatives.',
                'description' => 'The Partnerships Coordinator helps maintain strong partner relationships by organizing communication, tracking commitments, preparing meeting materials, and supporting collaborative activities.',
                'responsibilities' => 'Maintain partner records, schedule and document meetings, coordinate follow-up actions, prepare partner briefs, and support outreach for new collaboration opportunities.',
                'requirements' => 'Experience in stakeholder engagement, communications, administration, or partnerships. Excellent writing, organization, and follow-up discipline are important.',
                'benefits' => 'Remote work arrangement, flexible scheduling, and exposure to cross-sector partnership development.',
                'salary_range' => 'Competitive',
                'application_url' => 'https://example.com/careers/partnerships-coordinator',
                'application_email' => 'careers@example.com',
                'application_deadline' => now()->addWeeks(4),
                'status' => JobPostingStatus::Open->value,
                'sort_order' => 3,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Finance and Operations Officer',
                'department' => 'Operations',
                'location' => 'Lagos, Nigeria',
                'employment_type' => 'full_time',
                'workplace_type' => 'onsite',
                'summary' => 'Support financial administration, procurement, vendor coordination, and day-to-day operational controls.',
                'description' => 'The Finance and Operations Officer keeps daily finance and administrative processes accurate, documented, and responsive to program needs.',
                'responsibilities' => 'Process payment documentation, reconcile records, support procurement, maintain vendor files, coordinate logistics, and assist with budget tracking and operational reporting.',
                'requirements' => 'Experience in finance, accounting, procurement, or operations. Strong attention to detail, spreadsheet skills, and familiarity with basic financial controls are required.',
                'benefits' => 'Health coverage, structured operations support, professional development, and a collaborative office environment.',
                'salary_range' => 'NGN 350,000 - NGN 550,000 monthly',
                'application_url' => null,
                'application_email' => 'careers@example.com',
                'application_deadline' => now()->addWeeks(7),
                'status' => JobPostingStatus::Draft->value,
                'sort_order' => 4,
                'is_featured' => false,
                'is_published' => false,
            ],
            [
                'title' => 'Monitoring and Evaluation Specialist',
                'department' => 'Programs',
                'location' => 'Hybrid',
                'employment_type' => 'contract',
                'workplace_type' => 'hybrid',
                'summary' => 'Strengthen monitoring frameworks, indicators, learning routines, and performance reporting across programs.',
                'description' => 'The Monitoring and Evaluation Specialist supports teams with practical measurement systems that improve accountability, learning, and decision-making.',
                'responsibilities' => 'Develop indicators, refine data collection tools, review program data quality, facilitate learning sessions, and prepare monitoring reports for internal and partner use.',
                'requirements' => 'Experience designing monitoring frameworks and working with program data. Strong analytical, facilitation, and reporting skills are expected.',
                'benefits' => 'Flexible contract arrangement, field learning opportunities, and collaboration with program and research teams.',
                'salary_range' => 'Competitive',
                'application_url' => null,
                'application_email' => 'careers@example.com',
                'application_deadline' => now()->addWeeks(8),
                'status' => JobPostingStatus::Closed->value,
                'sort_order' => 5,
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'Communications Associate',
                'department' => 'Communications',
                'location' => 'Abuja, Nigeria',
                'employment_type' => 'full_time',
                'workplace_type' => 'hybrid',
                'summary' => 'Create written and digital content that shares program updates, stories, insights, and organizational news.',
                'description' => 'The Communications Associate helps translate program work into clear content for newsletters, websites, social channels, reports, and stakeholder updates.',
                'responsibilities' => 'Draft stories, edit program updates, coordinate visual assets, maintain content calendars, support event communications, and help publish approved digital content.',
                'requirements' => 'Experience in communications, journalism, marketing, public relations, or content production. Strong writing, editing, and coordination skills are needed.',
                'benefits' => 'Creative work environment, hybrid schedule, professional development, and opportunities to work across program areas.',
                'salary_range' => 'Competitive',
                'application_url' => null,
                'application_email' => 'careers@example.com',
                'application_deadline' => now()->addWeeks(6),
                'status' => JobPostingStatus::Archived->value,
                'sort_order' => 6,
                'is_featured' => false,
                'is_published' => false,
            ],
        ];

        foreach ($jobPostings as $jobPosting) {
            JobPosting::factory()->create($jobPosting);
        }
    }
}
