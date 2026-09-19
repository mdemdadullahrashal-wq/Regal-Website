<?php

namespace Database\Seeders;

use App\Models\PageContent;
use App\Models\Service;
use Illuminate\Database\Seeder;

class InitialWebsiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::query()->upsert([
            [
                'slug' => 'pos',
                'title_en' => 'POS Software',
                'title_bn' => 'POS সফটওয়্যার',
                'summary_en' => 'Retail and shop billing, inventory, and sales analytics in one platform.',
                'summary_bn' => 'রিটেইল ও শপ বিলিং, ইনভেন্টরি এবং সেলস অ্যানালিটিক্স এক প্ল্যাটফর্মে।',
                'features_en' => json_encode(['Barcode billing', 'Inventory sync', 'Sales report'], JSON_THROW_ON_ERROR),
                'features_bn' => json_encode(['বারকোড বিলিং', 'ইনভেন্টরি সিঙ্ক', 'সেলস রিপোর্ট'], JSON_THROW_ON_ERROR),
                'sort_order' => 1,
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'slug' => 'erp',
                'title_en' => 'ERP Software',
                'title_bn' => 'ERP সফটওয়্যার',
                'summary_en' => 'End-to-end business management for finance, HR, and operations.',
                'summary_bn' => 'ফাইন্যান্স, HR এবং অপারেশন পরিচালনার জন্য end-to-end business system।',
                'features_en' => json_encode(['Accounts and finance', 'HR and payroll', 'Operations dashboard'], JSON_THROW_ON_ERROR),
                'features_bn' => json_encode(['অ্যাকাউন্টস ও ফাইন্যান্স', 'HR ও পে-রোল', 'অপারেশন ড্যাশবোর্ড'], JSON_THROW_ON_ERROR),
                'sort_order' => 2,
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ],
            [
                'slug' => 'bus-ticketing',
                'title_en' => 'Bus Ticket Booking & Management',
                'title_bn' => 'বাস টিকেট বুকিং ও ম্যানেজমেন্ট',
                'summary_en' => 'Manage counters, routes, schedules, and ticket booking in real time.',
                'summary_bn' => 'কাউন্টার, রুট, শিডিউল এবং টিকেট বুকিং রিয়েল-টাইমে পরিচালনা করুন।',
                'features_en' => json_encode(['Counter management', 'Route planning', 'Online booking'], JSON_THROW_ON_ERROR),
                'features_bn' => json_encode(['কাউন্টার ম্যানেজমেন্ট', 'রুট প্ল্যানিং', 'অনলাইন বুকিং'], JSON_THROW_ON_ERROR),
                'sort_order' => 3,
                'is_active' => true,
                'updated_at' => now(),
                'created_at' => now(),
            ],
        ], ['slug']);

        PageContent::query()->upsert([
            [
                'key' => 'home',
                'title_en' => 'Your trusted automation partner',
                'title_bn' => 'আপনার বিশ্বস্ত অটোমেশন পার্টনার',
                'body_en' => 'Regal Solution builds subscription-ready software for businesses in Bangladesh local market.',
                'body_bn' => 'Regal Solution বাংলাদেশ লোকাল মার্কেটের ব্যবসার জন্য subscription-ready software তৈরি করে।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'about',
                'title_en' => 'About Regal Solution',
                'title_bn' => 'Regal Solution সম্পর্কে',
                'body_en' => 'We build practical software products and support clients with long-term automation strategy.',
                'body_bn' => 'আমরা বাস্তবমুখী সফটওয়্যার প্রোডাক্ট তৈরি করি এবং দীর্ঘমেয়াদি অটোমেশন স্ট্র্যাটেজিতে ক্লায়েন্টকে সহায়তা করি।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'services',
                'title_en' => 'Subscription Software Services',
                'title_bn' => 'সাবস্ক্রিপশন সফটওয়্যার সার্ভিস',
                'body_en' => 'Choose the right solution for your business type and operation scale.',
                'body_bn' => 'আপনার ব্যবসার ধরন ও অপারেশন স্কেল অনুযায়ী সঠিক সলিউশন বেছে নিন।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact',
                'title_en' => 'Contact Regal Solution',
                'title_bn' => 'Regal Solution এর সাথে যোগাযোগ',
                'body_en' => 'Tell us your requirement. We will suggest the right platform and onboarding plan.',
                'body_bn' => 'আপনার প্রয়োজন জানিয়ে দিন। আমরা উপযুক্ত platform ও onboarding plan সাজিয়ে দেব।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'career',
                'title_en' => 'Join Our Team',
                'title_bn' => 'আমাদের টিমে যোগ দিন',
                'body_en' => 'Share your profile and we will contact you when a matching role is available.',
                'body_bn' => 'আপনার প্রোফাইল শেয়ার করুন, উপযুক্ত সুযোগ হলে আমরা যোগাযোগ করব।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'privacy',
                'title_en' => 'Privacy Policy',
                'title_bn' => 'প্রাইভেসি পলিসি',
                'body_en' => 'We process submitted contact and career data only for communication and hiring purposes.',
                'body_bn' => 'যোগাযোগ ও নিয়োগ সংক্রান্ত উদ্দেশ্যে জমাকৃত contact ও career তথ্য ব্যবহার করা হয়।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'terms',
                'title_en' => 'Terms and Conditions',
                'title_bn' => 'শর্তাবলি',
                'body_en' => 'Software usage, subscriptions, and support are governed by signed business agreements.',
                'body_bn' => 'সফটওয়্যার ব্যবহার, subscription ও support signed business agreement অনুযায়ী পরিচালিত হয়।',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ], ['key']);
    }
}
